 var options = {
            chart: {
                width: 300,
                type: 'donut',
            },
            dataLabels: {
                enabled: false
            },
            series: [44, 55, 13, 33],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        show: true
                    }
                }
            }],
            legend: {
                position: 'top',
                width: 300
                
            }
        }
//End PieChart
//Area Chart
var areaOptions =  {
            chart: {
                height: 350,
                type: 'area',
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            series: [{
                name: 'Current Week',
                data: [31, 40, 28, 51, 42, 109, 100]
            }, {
                name: 'Last Week',
                data: [11, 32, 45, 32, 34, 52, 41]
            }],

            xaxis: {
                type: 'datetime',
                categories: ["2018-09-19T00:00:00", "2018-09-19T01:30:00", "2018-09-19T02:30:00", "2018-09-19T03:30:00", "2018-09-19T04:30:00", "2018-09-19T05:30:00", "2018-09-19T06:30:00"],                
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            }
        }

//Column Chart
     var colOptions = {
            chart: {
                height: 350,
                type: 'bar',
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'  
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            series: [{
                name: 'Net Profit',
                data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
            }, {
                name: 'Revenue',
                data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
            }, {
                name: 'Free Cash Flow',
                data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
            }],
            xaxis: {
                categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
            },
            yaxis: {
                title: {
                    text: '$ (thousands)'
                }
            },
            fill: {
                opacity: 1

            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return "$ " + val + " thousands"
                    }
                }
            }
        }


         var barOptions = {
                              chart: {
                                width: "100%",
                                height: 380,
                                type: "bar"
                              },
                              plotOptions: {
                                bar: {
                                  horizontal: true
                                }
                              },
                              dataLabels: {
                                enabled: false
                              },
                              stroke: {
                                width: 1,
                                colors: ["#fff"]
                              },
                              series: [
                                {
                                  data: [44, 55, 41, 64, 22, 43, 21]
                                },
                                {
                                  data: [53, 32, 33, 52, 13, 44, 32]
                                }
                              ],
                              xaxis: {
                                categories: [
                                  "Shop One",
                                  "Shop Two",
                                  "Shop Three",
                                  "Shop Four",
                                  "Shop Five",
                                  "Shop Six",
                                  "Shop Seven"
                                ]
                              },
                              legend: {
                                position: "right",
                                verticalAlign: "top",
                                containerMargin: {
                                  left: 35,
                                  right: 60
                                }
                              },
                              responsive: [
                                {
                                  breakpoint: 1000,
                                  options: {
                                    plotOptions: {
                                      bar: {
                                        horizontal: false
                                      }
                                    },
                                    legend: {
                                      position: "bottom"
                                    }
                                  }
                                }
                              ]
                            };



       var barChart = new ApexCharts(
            document.querySelector("#barChart"),
            barOptions
        );
        
       

        var colChart = new ApexCharts(
            document.querySelector("#columnChart"),
            colOptions
        );


        var aChart = new ApexCharts(
            document.querySelector("#aChart"),
            areaOptions
        );

        var chart = new ApexCharts(
            document.querySelector("#chart"),
            options
        );
         var chart2 = new ApexCharts(
            document.querySelector("#chart2"),
            options
        );
          var chart3 = new ApexCharts(
            document.querySelector("#chart3"),
            options
        );

        chart.render()
        chart2.render()
        chart3.render()
        aChart.render()
        barChart.render()
        colChart.render();

    

        