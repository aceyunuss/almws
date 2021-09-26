<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pm_tools extends CI_Model {
	public function __construct(){

		parent::__construct();
		$this->db_iproc = $this->load->database("iProc", TRUE);
	}

	public function dataMain($v) {

		$rkat_code = isset($v['rkat_code']) ? $v['rkat_code'] : "";
        /*$rkat_name = isset($v['rkat_name']) ? $v['rkat_name'] : "";
        $current_activity = isset($v['current_activity']) ? $v['current_activity'] : "";
        $last_update = isset($v['last_update']) ? $v['last_update'] : "";
        $rup_code = isset($v['rup_code']) ? $v['rup_code'] : "";
        $rup_name = isset($v['rup_name']) ? $v['rup_name'] : "";
        $pr_num_sap = isset($v['pr_num_sap']) ? $v['pr_num_sap'] : "";
        $pr_number = isset($v['pr_number']) ? $v['pr_number'] : "";
        $pr_subject_of_work = isset($v['pr_subject_of_work']) ? $v['pr_subject_of_work'] : "";
        $pr_requester_name = isset($v['pr_requester_name']) ? $v['pr_requester_name'] : "";
        $pr_dept_name = isset($v['pr_dept_name']) ? $v['pr_dept_name'] : "";
        $pr_currency = isset($v['pr_currency']) ? $v['pr_currency'] : "";
        $pr_pnp = isset($v['pr_pnp']) ? $v['pr_pnp'] : "";
        $ptm_number = isset($v['ptm_number']) ? $v['ptm_number'] : "";
        $ptm_subject_of_work = isset($v['ptm_subject_of_work']) ? $v['ptm_subject_of_work'] : "";
        $nilai = isset($v['nilai']) ? $v['nilai'] : "";
        $metode = isset($v['metode']) ? $v['metode'] : "";
        $note = isset($v['note']) ? $v['note'] : "";
*/
        // $this->db_iproc->group_start();
        /*if (!empty($rkat_code)) {
            $this->db_iproc->where('rkat_code', $rkat_code);
        }
        if (!empty($rkat_name)) {
            $this->db_iproc->where('rkat_name', $rkat_name);
        }
       if (!empty($current_activity)) {
            $this->db_iproc->where('current_activity', $current_activity);
        }
       if (!empty($last_update)) {
            $this->db_iproc->where('last_update', $last_update);
        }
       if (!empty($rup_code)) {
            $this->db_iproc->where('rup_code', $rup_code);
        }
       if (!empty($rup_name)) {
            $this->db_iproc->where('rup_name', $rup_name);
        }
       if (!empty($pr_num_sap)) {
            $this->db_iproc->where('pr_num_sap', $pr_num_sap);
        }
       if (!empty($pr_number)) {
            $this->db_iproc->where('pr_number', $pr_number);
        }
       if (!empty($pr_subject_of_work)) {
            $this->db_iproc->where('pr_subject_of_work', $pr_subject_of_work);
        }
       if (!empty($pr_requester_name)) {
            $this->db_iproc->where('pr_requester_name', $pr_requester_name);
        }
       if (!empty($pr_dept_name)) {
            $this->db_iproc->where('pr_dept_name', $pr_dept_name);
        }
       if (!empty($pr_currency)) {
            $this->db_iproc->where('pr_currency', $pr_currency);
        }
       if (!empty($pr_pnp)) {
            $this->db_iproc->where('pr_pnp', $pr_pnp);
        }
       if (!empty($ptm_number)) {
            $this->db_iproc->where('ptm_number', $ptm_number);
        }
       if (!empty($ptm_subject_of_work)) {
            $this->db_iproc->where('ptm_subject_of_work', $ptm_subject_of_work);
        }
       if (!empty($nilai)) {
            $this->db_iproc->where('nilai', $nilai);
        }
       if (!empty($metode)) {
            $this->db_iproc->where('metode', $metode);
        }
       if (!empty($note)) {
            $this->db_iproc->where('note', $note);
        }*/

        $this->db_iproc->where('rkat_code', $rkat_code);

		return $this->db_iproc->get('vw_pm_tools_main');		

	}

	public function dataPRSAP($rup_code) {
		if($rup_code){
			$this->db_iproc->where('rup_code', $rup_code);
			return $this->db_iproc->get('vw_pm_tools_item');		
		} else {
			return [];
		}		
	}

	public function itemActivity($prm_number,$ptm_number) {
		if($prm_number && $ptm_number){			
			$sampul = $this->getData('vw_master_methode_sampul',['ptm_number','kode_methode','tender_methode',
  					'ptp_submission_method','tipe_pemasukan_penawaran','ptp_prequalify','adm_bid_committee'],
                  	['ptm_number'=>$ptm_number])->row_array();
			 

			$sampul['adm_bid_committee'] =0;
			if($sampul['adm_bid_committee']){
				$sampul['adm_bid_committee'] =1;
			}

			$sql = "SELECT workflow,act_name,act_status,act_date from ( 
		        SELECT ROW_NUMBER() OVER(ORDER BY sts_act.workflow) AS rownum,* from ( 
		        select ROW_NUMBER() OVER(PARTITION BY ams.workflow ORDER BY ptc.ptc_end_date DESC) AS row, 
		        ams.methode,ams.submission, ams.methode_text,ams.workflow ,awa.awa_name as act_name
		        , prc.prm_number, prc.prc_end_date as end_date_rpp
		        , ptc.ptm_number ,ptc.ptc_end_date as end_date_rfq
		        ,CASE
		            WHEN upper(methode_text) ='RPP' THEN prc.prc_end_date
		            ELSE ptc.ptc_end_date
		          END as act_date
		        ,ptp.ptp_is_aanwijzing
		        ,to_act.maks
		        ,CASE 
		          WHEN upper(methode_text) ='RPP' and prc.prm_number is not null and prc.prc_end_date is not null then 'Sudah' 
		          WHEN upper(methode_text) ='RPP' and prc.prm_number is not null and prc.prc_end_date is null then 'Sedang Berlangsung' 

		          WHEN upper(methode_text) !='RPP' and ptc.ptm_number is not null and ptc.ptc_end_date is not null then 'Sudah' 
		          -- WHEN upper(methode_text) !='RPP' and ptc.ptm_number is not null and ptc.ptc_end_date is null then 'Sedang Berlangsung' 

		          WHEN 
				  ams.workflow < 1031 and  
				  prc.prm_number is not null and prc.prc_end_date is null then 'Sedang Berlangsung' 
				
				  WHEN 
				  ams.workflow >= 1031 and 
				  ptc.ptm_number is not null and ptc.ptc_end_date is null then 'Sedang Berlangsung' 

		          WHEN upper(methode_text) !='RPP' and to_act.maks >1080 and ams.workflow=1080 and ptc.ptm_number is null and ptc.ptc_end_date is null 
		         
		              then 'Tidak Dipilih'
		          else 'Belum' 
		        END as act_status 
		        from adm_methode_sampul ams 
		          
		          LEFT JOIN prc_rpp_comment prc on ams.workflow=prc.prc_activity and prc.prm_number='".$prm_number."'
		         
		          LEFT JOIN prc_tender_comment ptc on ams.workflow=ptc.ptc_activity and ptc.ptm_number='".$ptm_number."' 
		          LEFT JOIN adm_wkf_activity awa on ams.workflow=awa.awa_id 
		          LEFT JOIN prc_tender_prep ptp on ptc.ptm_number=ptp.ptm_number    
		          LEFT JOIN (
		            select act_max.ptm_number, max(act_max.ptc_activity) as maks from prc_tender_comment act_max
		            GROUP BY act_max.ptm_number
		          ) to_act on '".$ptm_number."'=to_act.ptm_number    
		        where ams.methode=".$sampul['kode_methode']." and ams.submission=".$sampul['ptp_submission_method']."
		              or ams.methode_text='RPP'
		        ) sts_act where row=1 
		      ) m_sts_act
		      order by workflow ";
		     
		      return $this->db_iproc->query($sql)->result_array();	      
		} else {
			return [];
		}		
	}

	
	public function getData($table,$select = [],$where = []){
		if(!empty($select)){
			$this->db_iproc->select($select);
		}
		if(!empty($where)){
			$this->db_iproc->where($where);
		}
		if(!empty($order)){
			$this->db_iproc->order_by($order);
		}
		return $this->db_iproc->get($table);

	}

	public function insertToLog($user,$url,$methode,$data,$type,$result){
		$params = [
					'url' => $url,
					'methode' => $methode,
					'data' => $data,
					'result' => $result
				  ];

		$input = [
			        'created_by' => $user,
			        'data' => json_encode($params),
			        'integration_type' => $type,
			        'date_added' => date("Y-m-d H:i:s")
				];

		$this->db_iproc->insert('z_integration_log', $input);
	}
	

	
}