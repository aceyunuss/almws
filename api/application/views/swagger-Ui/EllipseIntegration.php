{  
   "openapi":"3.0.1",
   "info":{  
      "title":"Webservice iProcurement",
      "description":"Webservice integrasi iProc LPS",
      "version":"0.1"
   },
   "servers":[  
      {  
         "url":"<?php echo site_url() ?>index.php/v1"
      }
   ],
   "tags":[  
      {  
         "name":"Master Project Cost",
         "description":"Modul Master Project Cost",
      },
     
   ],
   "paths":{  
      "/User/CheckLogin":{  
         "post":{  
            "tags":[  
               "Master Project Cost"
            ],
            "description":"Web Service untuk mendapatkan Master Project Cost",
            "operationId": "addMSO010",
            "requestBody":{  
               "description":"Request body dengan pencarian Berdasarkan tahun",
               "required":true,
               "content":{  
                  "application/json":{  
                     "schema":{  
                        "type":"object",
                           "properties":{  
                              "PASSWORD":{  
                                 "type":"string"
                              },
                              "YEAR":{  
                                 "type":"integer"
                              },
                           }
                     }
                  }
               }
            },
            "responses":{  
               "200":{  
                  "description":"Success"
               },
               "502":{  
                  "description":"Failed"
               }
            }
         },
      },

      "/Lelang_Header":{  
         "post":{  
            "tags":["Web LPS"],
            "description":"Web Service untuk mendapatkan Header Lelang",
            "operationId": "dataLelang",
            "requestBody":{  
               "description":"Required *",
               "content":{  
                  "application/json":{  
                     "schema":{  
                        "type":"object",
                           "properties":{  
                              "key":{  
                                 "type":"string"
                              },
                              "ptm_number":{  
                                 "type":"string"
                              },
                              "ptm_subject_of_work":{  
                                 "type":"string"
                              },
                              "ptp_reg_opening_date":{  
                                 "type":"string"
                              },
                              "ptp_reg_closing_date":{  
                                 "type":"string"
                              },
                              "reg_status":{  
                                 "type":"string"
                              },
                           },
                        "required":[
                              key,
                           ],
                        }
                     }
                  }
               },
            "responses":{  
               "200":{  
                  "description":"Success"
               },
               "500":{  
                  "description":"Failed"
               }
            }
         },
      },


      "/Pm_tools":{  
         "post":{  
            "tags":["PM Tools"],
            "description":"Web Service Data Informasi Monitoring Project Management",
            "operationId": "PMTools",
            "requestBody":{  
               "description":"Required *",
               "content":{  
                  "application/json":{  
                     "schema":{  
                        "type":"object",
                           "properties":{  
                              "key":{  
                                 "type":"string"
                              },
                               "rkat_code":{  
                                 "type":"string"
                              }
                           },
                        "required":[
                              key,
                              rkat_code
                           ],
                        }
                     }
                  }
               },
            "responses":{  
               "200":{  
                  "description":"Success"
               },
               "500":{  
                  "description":"Failed"
               }
            }
         },
      },

      
      "components":{  
         "securitySchemes":{  
            "basic":{  
               "type":"https",
               "scheme":"basic"
            }
         }
      }
   }

}