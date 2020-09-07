<!DOCTYPE html>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Statistik Pencapaian Kinerja <br>
                <?php if(isset($prd)){echo 'Periode '.$prd;}?>
                <?php if(isset($thn)){echo ' Tahun '.$thn;}?>
                </h3>
              </div>

              <div class="title_right">
                
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="x_panel">
                  <div class="x_title">
                  <form method= "POST" action="<?php echo base_url();?>c_perencanaan/filterGrafik">
                    <h2>
                      <select class="form-control" id="periode" name="periode" >
                          <option value="semua">Semua Periode</option>
                          <option value="Triwulan1">Triwulan 1</option>
                          <option value="Triwulan2">Triwulan 2</option>
                          <option value="Triwulan3">Triwulan 3</option>
                          <option value="Triwulan4">Triwulan 4</option>
                      </select>
                    </h2>
                    <h2>
                      <select class="form-control" id="tahun" name="tahun" >
                          <option value="semua">Semua Tahun</option>
                          <?php
                            foreach ($tahun as $key) {
                              echo '<option value="'.$key['tahun'].'">'.$key['tahun'].'</option>';
                            }
                          ?>
                      </select>
                    </h2>
                    <h2 class="nav navbar-right panel_toolbox">
                      <input class="btn btn-info btn-sm-right" type="submit" name="filter" value="Filter">
                    </h2>
                  </form>
                    
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div id="grafik-pencapaian" style="height:350px;"></div>

                  </div>
                </div>

            </div>
          </div>
        </div>
        <!-- /page content -->

        
      </div>
    </div>

    <?php
      $grafikPrc=$statistik['rpublikasi'].", ".$statistik['rpenelitian'].", ".$statistik['rpengmas'].", ".$statistik['rhaki'].", ".$statistik['rbukuajar'].", ".$statistik['rsertifikasi'].", ".$statistik['rpostingan'];
      $grafikRls=$pk_publikasi.", ".$pk_penelitian.", ".$pk_pengmas.", ".$pk_haki.", ".$pk_bukuajar.", ".$pk_sertifikasi.", ".$pk_blog;
    ?>

    <input type="hidden" value="0,0,0,0,0,0,0" id="grafikPrc">
    <input type="hidden" value="0,0,0,0,0,0,0" id="grafikRls">

    <!-- jQuery -->
    <script src="<?php echo base_url();?>/assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url();?>/assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url();?>/assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url();?>/assets/vendors/nprogress/nprogress.js"></script>
    <!-- morris.js -->
    <script src="<?php echo base_url();?>/assets/vendors/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url();?>/assets/vendors/morris.js/morris.min.js"></script>
    <!-- ECharts -->
    <script src="<?php echo base_url();?>assets/vendors/echarts/dist/echarts.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/echarts/map/js/world.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url();?>/assets/build/js/custom.js"></script>

    <script >
      $(document).ready(function(){
    
          var theme = {
          color: [
            '#26B99A', '#34495E', '#BDC3C7', '#3498DB',
            '#9B59B6', '#8abb6f', '#759c6a', '#bfd3b7'
          ],

          title: {
            itemGap: 8,
            textStyle: {
              fontWeight: 'normal',
              color: '#408829'
            }
          },

          dataRange: {
            color: ['#1f610a', '#97b58d']
          },

          toolbox: {
            color: ['#408829', '#408829', '#408829', '#408829']
          },

          tooltip: {
            backgroundColor: 'rgba(0,0,0,0.5)',
            axisPointer: {
              type: 'line',
              lineStyle: {
                color: '#408829',
                type: 'dashed'
              },
              crossStyle: {
                color: '#408829'
              },
              shadowStyle: {
                color: 'rgba(200,200,200,0.3)'
              }
            }
          },

          dataZoom: {
            dataBackgroundColor: '#eee',
            fillerColor: 'rgba(64,136,41,0.2)',
            handleColor: '#408829'
          },
          grid: {
            borderWidth: 0
          },

          categoryAxis: {
            axisLine: {
              lineStyle: {
                color: '#408829'
              }
            },
            splitLine: {
              lineStyle: {
                color: ['#eee']
              }
            }
          },

          valueAxis: {
            axisLine: {
              lineStyle: {
                color: '#408829'
              }
            },
            splitArea: {
              show: true,
              areaStyle: {
                color: ['rgba(250,250,250,0.1)', 'rgba(200,200,200,0.1)']
              }
            },
            splitLine: {
              lineStyle: {
                color: ['#eee']
              }
            }
          },
          timeline: {
            lineStyle: {
              color: '#408829'
            },
            controlStyle: {
              normal: {color: '#408829'},
              emphasis: {color: '#408829'}
            }
          },

          k: {
            itemStyle: {
              normal: {
                color: '#68a54a',
                color0: '#a9cba2',
                lineStyle: {
                  width: 1,
                  color: '#408829',
                  color0: '#86b379'
                }
              }
            }
          },
          map: {
            itemStyle: {
              normal: {
                areaStyle: {
                  color: '#ddd'
                },
                label: {
                  textStyle: {
                    color: '#c12e34'
                  }
                }
              },
              emphasis: {
                areaStyle: {
                  color: '#99d2dd'
                },
                label: {
                  textStyle: {
                    color: '#c12e34'
                  }
                }
              }
            }
          },
          force: {
            itemStyle: {
              normal: {
                linkStyle: {
                  strokeColor: '#408829'
                }
              }
            }
          },
          chord: {
            padding: 4,
            itemStyle: {
              normal: {
                lineStyle: {
                  width: 1,
                  color: 'rgba(128, 128, 128, 0.5)'
                },
                chordStyle: {
                  lineStyle: {
                    width: 1,
                    color: 'rgba(128, 128, 128, 0.5)'
                  }
                }
              },
              emphasis: {
                lineStyle: {
                  width: 1,
                  color: 'rgba(128, 128, 128, 0.5)'
                },
                chordStyle: {
                  lineStyle: {
                    width: 1,
                    color: 'rgba(128, 128, 128, 0.5)'
                  }
                }
              }
            }
          },
          gauge: {
            startAngle: 225,
            endAngle: -45,
            axisLine: {
              show: true,
              lineStyle: {
                color: [[0.2, '#86b379'], [0.8, '#68a54a'], [1, '#408829']],
                width: 8
              }
            },
            axisTick: {
              splitNumber: 10,
              length: 12,
              lineStyle: {
                color: 'auto'
              }
            },
            axisLabel: {
              textStyle: {
                color: 'auto'
              }
            },
            splitLine: {
              length: 18,
              lineStyle: {
                color: 'auto'
              }
            },
            pointer: {
              length: '90%',
              color: 'auto'
            },
            title: {
              textStyle: {
                color: '#333'
              }
            },
            detail: {
              textStyle: {
                color: 'auto'
              }
            }
          },
          textStyle: {
            fontFamily: 'Arial, Verdana, sans-serif'
          }
        };

          var echartBar = echarts.init(document.getElementById('grafik-pencapaian'), theme);
          /*var grafikPrc= String($("#grafikPrc").val());
          var grafikRls= String($("#grafikRls").val());
          alert(grafikPrc);*/

          echartBar.setOption({
          /*title: {
            text: 'Pemetaan Perencanaan dan Realisasi'
          },*/
          tooltip: {
            trigger: 'axis'
          },
          legend: {
            data: ['Perencanaan', 'Realisasi']
          },
          toolbox: {
            show: false
          },
          calculable: false,
          xAxis: [{
            type: 'category',
            data: ['Publikasi', 'Penelitian', 'Abdimas', 'HAKI', 'Buku Ajar', 'Sertifikasi', 'Blog']
          }],
          yAxis: [{
            type: 'value'
          }],
          series: [{
            name: 'Perencanaan',
            type: 'bar',
            data: [<?=$grafikPrc?>], //datanya
            markPoint: { //kalo mau dikasih tanda tanda gajelas gitu diganti ganti aja disini lalala
            data: [{
              type: 'max',
              name: 'Terbesar'
            }, {
              type: 'min',
              name: 'Terkecil'
            }]
            },
            markLine: {
            data: [{
              type: 'average',
              name: 'Rata-rata'
            }]
            }
          }, {
            name: 'Realisasi',
            type: 'bar',
            data: [<?=$grafikRls?>], //datanya
            markPoint: {
            data: [{
              name: 'Perencanaan',
              value: 182.2,
              xAxis: 7,
              yAxis: 183,
            }, {
              name: 'Realisasi',
              value: 2.3,
              xAxis: 11,
              yAxis: 3
            }]
            },
            markPoint: { //kalo mau dikasih tanda tanda gajelas gitu diganti ganti aja disini lalala
            data: [{
              type: 'max',
              name: 'Terbesar'
            }, {
              type: 'min',
              name: 'Terkecil'
            }]
            },
            markLine: {
            data: [{
              type: 'average',
              name: 'Rata-rata'
            }]
            }
          }]
          });
      });
    </script>
  </body>
</html>