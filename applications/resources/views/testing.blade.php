<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('backend/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <script src="{{ asset('backend/vendors/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js"></script>
  </head>
  <body>

<div style="float: left; width: 50%; height: 50vh; padding: 20px 10px; margin-bottom: 60px; text-align: center;">
<h4>Chart Page Impression</h4>
<canvas id="chartPageImpression"></canvas>
  <div style="text-align: center;">
    <label>
      <a id="pagingImpressionPrev" onclick="pagingImpression(this)">Prev</a>
    </label>
    <label>
      <a id="pagingImpressionNext" onclick="pagingImpression(this)">Next</a>
    </label>
  </div>
</div>

<div style="float: left; width: 50%; height: 50vh; padding: 20px 10px; margin-bottom: 60px; text-align: center;">
<h4>Chart Page Impression Organic</h4>
<canvas id="chartPageImpressionOrganic"></canvas>
  <div style="text-align: center;">
    <label>
      <a id="pagingImpressionOrganicPrev" onclick="pagingImpressionOrganic(this)">Prev</a>
    </label>
    <label>
      <a id="pagingImpressionOrganicNext" onclick="pagingImpressionOrganic(this)">Next</a>
    </label>
  </div>
</div>

<div style="float: left; width: 50%; height: 50vh; padding: 20px 10px; margin-bottom: 60px; text-align: center;">
<h4>Chart Page View</h4>
<canvas id="chartPageView"></canvas>
  <div style="text-align: center;">
    <label>
      <a id="pagingPageViewPrev" onclick="pagingPageView(this)">Prev</a>
    </label>
    <label>
      <a id="pagingPageViewNext" onclick="pagingPageView(this)">Next</a>
    </label>
  </div>
</div>

<div style="float: left; width: 50%; height: 50vh; padding: 20px 10px; margin-bottom: 60px; text-align: center;">
<h4>Chart Engaged User</h4>
<canvas id="chartEngagedUser"></canvas>
  <div style="text-align: center;">
    <label>
      <a id="pagingEngagedUserPrev" onclick="pagingEngagedUser(this)">Prev</a>
    </label>
    <label>
      <a id="pagingEngagedUserNext" onclick="pagingEngagedUser(this)">Next</a>
    </label>
  </div>
</div>


<script type="text/javascript">
window.onload = function () {
  var urlGetJson =  "{{ route('analytics.getJson') }}";

  $.getJSON(urlGetJson, function (json) {
    
    // Page Impression

    var captionDay = new Array();
    json.pageImpressionDayDatas.map(function(item) {
      captionDay.push(item.end_time.substring(0, 10));
    });
    var countDay = new Array();
    json.pageImpressionDayDatas.map(function(item) {
      countDay.push(parseInt(item.value));
    });
    var countWeek = new Array();
    json.pageImpressionWeekDatas.map(function(item) {
      countWeek.push(parseInt(item.value));
    });
    var countMonth = new Array();
    json.pageImpressionMonthDatas.map(function(item) {
      countMonth.push(parseInt(item.value));
    });

    // for paging
    $.each(json, function (name, value) {
      if (name == "pageImpressionPaging") {
        $.each(value, function (name, value) {
          if (name == "previous") {
            document.getElementById('pagingImpressionPrev').setAttribute('data-target', value);
          }
          if (name == "next") {
            document.getElementById('pagingImpressionNext').setAttribute('data-target', value);
          }
        });
      }
    });
    // end for paging

    var cPI = document.getElementById("chartPageImpression");
    var lineChartPageImpression = new Chart(cPI, {
        type: 'line',
        data: {
          labels: captionDay,
          datasets: [
              {
                label: "Page Impression Day",
                data: eval(countDay),
                backgroundColor : "rgba(255,0,0,.5)"
              },
              {
                label: "Page Impression Week",
                data: eval(countWeek),
                backgroundColor : "rgba(0,255,0,.5)"
              },
              {
                label: "Page Impression 28 Days",
                data: eval(countMonth),
                backgroundColor : "rgba(0,0,255,.5)"
              }


            ]
        }
    });
    // End Page Impression 

    // Page Impression Organic

    var captionDay = new Array();
    json.pageImpressionOrganicDayDatas.map(function(item) {
      captionDay.push(item.end_time.substring(0, 10));
    });
    var countDay = new Array();
    json.pageImpressionOrganicDayDatas.map(function(item) {
      countDay.push(parseInt(item.value));
    });
    var countWeek = new Array();
    json.pageImpressionOrganicWeekDatas.map(function(item) {
      countWeek.push(parseInt(item.value));
    });
    var countMonth = new Array();
    json.pageImpressionOrganicMonthDatas.map(function(item) {
      countMonth.push(parseInt(item.value));
    });

    // for paging
    $.each(json, function (name, value) {
      if (name == "pageImpressionOrganicPaging") {
        $.each(value, function (name, value) {
          if (name == "previous") {
            document.getElementById('pagingImpressionOrganicPrev').setAttribute('data-target', value);
          }
          if (name == "next") {
            document.getElementById('pagingImpressionOrganicNext').setAttribute('data-target', value);
          }
        });
      }
    });
    // end for paging

    var cPIO = document.getElementById("chartPageImpressionOrganic");
    var lineChartPageImpressionOrganic = new Chart(cPIO, {
        type: 'line',
        data: {
          labels: captionDay,
          datasets: [
              {
                label: "Page Impression Organic Day",
                data: eval(countDay),
                backgroundColor : "rgba(255,0,0,.5)"
              },
              {
                label: "Page Impression Organic Week",
                data: eval(countWeek),
                backgroundColor : "rgba(0,255,0,.5)"
              },
              {
                label: "Page Impression Organic 28 Days",
                data: eval(countMonth),
                backgroundColor : "rgba(0,0,255,.5)"
              }


            ]
        }
    });
    // End Page Impression Organic

    // Page Page View

    var captionDay = new Array();
    json.pagePageViewDayDatas.map(function(item) {
      captionDay.push(item.end_time.substring(0, 10));
    });
    var countDay = new Array();
    json.pagePageViewDayDatas.map(function(item) {
      countDay.push(parseInt(item.value));
    });
    var countWeek = new Array();
    json.pagePageViewWeekDatas.map(function(item) {
      countWeek.push(parseInt(item.value));
    });
    var countMonth = new Array();
    json.pagePageViewMonthDatas.map(function(item) {
      countMonth.push(parseInt(item.value));
    });

    // for paging
    $.each(json, function (name, value) {
      if (name == "pagePageViewPaging") {
        $.each(value, function (name, value) {
          if (name == "previous") {
            document.getElementById('pagingPageViewPrev').setAttribute('data-target', value);
          }
          if (name == "next") {
            document.getElementById('pagingPageViewNext').setAttribute('data-target', value);
          }
        });
      }
    });
    // end for paging

    var cPV = document.getElementById("chartPageView");
    var lineChartPageView = new Chart(cPV, {
        type: 'line',
        data: {
          labels: captionDay,
          datasets: [
              {
                label: "Page View Day",
                data: eval(countDay),
                backgroundColor : "rgba(255,0,0,.5)"
              },
              {
                label: "Page View Week",
                data: eval(countWeek),
                backgroundColor : "rgba(0,255,0,.5)"
              },
              {
                label: "Page View 28 Days",
                data: eval(countMonth),
                backgroundColor : "rgba(0,0,255,.5)"
              }


            ]
        }
    });
    // End Page Page View

    // Engaged User

    var captionDay = new Array();
    json.pageEngagedUserDayDatas.map(function(item) {
      captionDay.push(item.end_time.substring(0, 10));
    });
    var countDay = new Array();
    json.pageEngagedUserDayDatas.map(function(item) {
      countDay.push(parseInt(item.value));
    });
    var countWeek = new Array();
    json.pageEngagedUserWeekDatas.map(function(item) {
      countWeek.push(parseInt(item.value));
    });
    var countMonth = new Array();
    json.pageEngagedUserMonthDatas.map(function(item) {
      countMonth.push(parseInt(item.value));
    });

    // for paging
    $.each(json, function (name, value) {
      if (name == "pageEngagedUserPaging") {
        $.each(value, function (name, value) {
          if (name == "previous") {
            document.getElementById('pagingEngagedUserPrev').setAttribute('data-target', value);
          }
          if (name == "next") {
            document.getElementById('pagingEngagedUserNext').setAttribute('data-target', value);
          }
        });
      }
    });
    // end for paging

    var cEU = document.getElementById("chartEngagedUser");
    var lineChartEngagedUser = new Chart(cEU, {
        type: 'line',
        data: {
          labels: captionDay,
          datasets: [
              {
                label: "Page Engaged User Day",
                data: eval(countDay),
                backgroundColor : "rgba(255,0,0,.5)"
              },
              {
                label: "Page Engaged User Week",
                data: eval(countWeek),
                backgroundColor : "rgba(0,255,0,.5)"
              },
              {
                label: "Page Engaged User 28 Days",
                data: eval(countMonth),
                backgroundColor : "rgba(0,0,255,.5)"
              }


            ]
        }
    });
    // End Engaged User

  });
}
</script>

<script type="text/javascript">
function pagingImpression(data){
  var urlGetJsonUpdate = data.getAttribute('data-target');
  $.getJSON(urlGetJsonUpdate, function (json) {
    var captionDayUpdate = new Array();
    var countDayUpdate = new Array();
    var countMonthUpdate = new Array();
    var countWeekUpdate = new Array();
    
    $.each(json, function (name, value) {
      if (name == "paging") {
        $.each(value, function (name, value) {
          if (name == "previous") {
            document.getElementById('pagingImpressionPrev').setAttribute('data-target', value);
          }
          if (name == "next") {
            document.getElementById('pagingImpressionNext').setAttribute('data-target', value);
          }
        });
      }
      if (name == "data") {
        var obj = 0;
        $.each(value, function (name, value) {
          $.each(value, function (name, value) {
              if (name == "values") {
                $.each(value, function (name, value) {
                  $.each(value, function (name, value) {
                    if (name == "end_time") {
                      if (obj == 0) {
                        captionDayUpdate.push(value.substring(0, 10));
                      }
                    }
                    if (name == "value") {
                      if (obj == 0) {
                        countDayUpdate.push(parseInt(value));
                      }
                      if (obj == 1) {
                        countWeekUpdate.push(parseInt(value));
                      }
                      if (obj == 2) {
                        countMonthUpdate.push(parseInt(value));
                      }
                    }
                  });
                });  
              }
          });
          obj++;
        });
      }
    });

    $('#chartPageImpression').replaceWith('<canvas id="chartPageImpression"></canvas>');

    var cPI = document.getElementById("chartPageImpression");
    var lineChartPageImpression = new Chart(cPI, {
        type: 'line',
        data: {
          labels: captionDayUpdate,
          datasets: [
              {
                label: "Page Impression Day",
                data: eval(countDayUpdate),
                backgroundColor : "rgba(255,0,0,.5)"
              },
              {
                label: "Page Impression Week",
                data: eval(countWeekUpdate),
                backgroundColor : "rgba(0,255,0,.5)"
              },
              {
                label: "Page Impression 28 Days",
                data: eval(countMonthUpdate),
                backgroundColor : "rgba(0,0,255,.5)"
              }


            ]
        },
      });

  });
}

function pagingImpressionOrganic(data){
  var urlGetJsonUpdate = data.getAttribute('data-target');
  $.getJSON(urlGetJsonUpdate, function (json) {
    var captionDayUpdate = new Array();
    var countDayUpdate = new Array();
    var countMonthUpdate = new Array();
    var countWeekUpdate = new Array();
    
    $.each(json, function (name, value) {
      if (name == "paging") {
        $.each(value, function (name, value) {
          if (name == "previous") {
            document.getElementById('pagingImpressionOrganicPrev').setAttribute('data-target', value);
          }
          if (name == "next") {
            document.getElementById('pagingImpressionOrganicNext').setAttribute('data-target', value);
          }
        });
      }
      if (name == "data") {
        var obj = 0;
        $.each(value, function (name, value) {
          $.each(value, function (name, value) {
              if (name == "values") {
                $.each(value, function (name, value) {
                  $.each(value, function (name, value) {
                    if (name == "end_time") {
                      if (obj == 0) {
                        captionDayUpdate.push(value.substring(0, 10));
                      }
                    }
                    if (name == "value") {
                      if (obj == 0) {
                        countDayUpdate.push(parseInt(value));
                      }
                      if (obj == 1) {
                        countWeekUpdate.push(parseInt(value));
                      }
                      if (obj == 2) {
                        countMonthUpdate.push(parseInt(value));
                      }
                    }
                  });
                });  
              }
          });
          obj++;
        });
      }
    });

    $('#chartPageImpressionOrganic').replaceWith('<canvas id="chartPageImpressionOrganic"></canvas>');

    var cPIO = document.getElementById("chartPageImpressionOrganic");
    var lineChartPageImpressionOrganic = new Chart(cPIO, {
        type: 'line',
        data: {
          labels: captionDayUpdate,
          datasets: [
              {
                label: "Page Impression Organic Day",
                data: eval(countDayUpdate),
                backgroundColor : "rgba(255,0,0,.5)"
              },
              {
                label: "Page Impression Organic Week",
                data: eval(countWeekUpdate),
                backgroundColor : "rgba(0,255,0,.5)"
              },
              {
                label: "Page Impression Organic 28 Days",
                data: eval(countMonthUpdate),
                backgroundColor : "rgba(0,0,255,.5)"
              }


            ]
        },
      });

  });
}

function pagingPageView(data){
  var urlGetJsonUpdate = data.getAttribute('data-target');
  $.getJSON(urlGetJsonUpdate, function (json) {
    var captionDayUpdate = new Array();
    var countDayUpdate = new Array();
    var countMonthUpdate = new Array();
    var countWeekUpdate = new Array();
    
    $.each(json, function (name, value) {
      if (name == "paging") {
        $.each(value, function (name, value) {
          if (name == "previous") {
            document.getElementById('pagingPageViewPrev').setAttribute('data-target', value);
          }
          if (name == "next") {
            document.getElementById('pagingPageViewNext').setAttribute('data-target', value);
          }
        });
      }
      if (name == "data") {
        var obj = 0;
        $.each(value, function (name, value) {
          $.each(value, function (name, value) {
              if (name == "values") {
                $.each(value, function (name, value) {
                  $.each(value, function (name, value) {
                    if (name == "end_time") {
                      if (obj == 0) {
                        captionDayUpdate.push(value.substring(0, 10));
                      }
                    }
                    if (name == "value") {
                      if (obj == 0) {
                        countDayUpdate.push(parseInt(value));
                      }
                      if (obj == 1) {
                        countWeekUpdate.push(parseInt(value));
                      }
                      if (obj == 2) {
                        countMonthUpdate.push(parseInt(value));
                      }
                    }
                  });
                });  
              }
          });
          obj++;
        });
      }
    });

    $('#chartPageView').replaceWith('<canvas id="chartPageView"></canvas>');

    var cPV = document.getElementById("chartPageView");
    var lineChartPageView = new Chart(cPV, {
        type: 'line',
        data: {
          labels: captionDayUpdate,
          datasets: [
              {
                label: "Page View Day",
                data: eval(countDayUpdate),
                backgroundColor : "rgba(255,0,0,.5)"
              },
              {
                label: "Page View Week",
                data: eval(countWeekUpdate),
                backgroundColor : "rgba(0,255,0,.5)"
              },
              {
                label: "Page View 28 Days",
                data: eval(countMonthUpdate),
                backgroundColor : "rgba(0,0,255,.5)"
              }


            ]
        },
      });

  });
}

function pagingEngagedUser(data){
  var urlGetJsonUpdate = data.getAttribute('data-target');
  $.getJSON(urlGetJsonUpdate, function (json) {
    var captionDayUpdate = new Array();
    var countDayUpdate = new Array();
    var countMonthUpdate = new Array();
    var countWeekUpdate = new Array();
    
    $.each(json, function (name, value) {
      if (name == "paging") {
        $.each(value, function (name, value) {
          if (name == "previous") {
            document.getElementById('pagingEngagedUserPrev').setAttribute('data-target', value);
          }
          if (name == "next") {
            document.getElementById('pagingEngagedUserNext').setAttribute('data-target', value);
          }
        });
      }
      if (name == "data") {
        var obj = 0;
        $.each(value, function (name, value) {
          $.each(value, function (name, value) {
              if (name == "values") {
                $.each(value, function (name, value) {
                  $.each(value, function (name, value) {
                    if (name == "end_time") {
                      if (obj == 0) {
                        captionDayUpdate.push(value.substring(0, 10));
                      }
                    }
                    if (name == "value") {
                      if (obj == 0) {
                        countDayUpdate.push(parseInt(value));
                      }
                      if (obj == 1) {
                        countWeekUpdate.push(parseInt(value));
                      }
                      if (obj == 2) {
                        countMonthUpdate.push(parseInt(value));
                      }
                    }
                  });
                });  
              }
          });
          obj++;
        });
      }
    });

    $('#chartEngagedUser').replaceWith('<canvas id="chartEngagedUser"></canvas>');

    var cEU = document.getElementById("chartEngagedUser");
    var lineChartPageView = new Chart(cEU, {
        type: 'line',
        data: {
          labels: captionDayUpdate,
          datasets: [
              {
                label: "Page Engaged User Day",
                data: eval(countDayUpdate),
                backgroundColor : "rgba(255,0,0,.5)"
              },
              {
                label: "Page Engaged User Week",
                data: eval(countWeekUpdate),
                backgroundColor : "rgba(0,255,0,.5)"
              },
              {
                label: "Page Engaged User 28 Days",
                data: eval(countMonthUpdate),
                backgroundColor : "rgba(0,0,255,.5)"
              }


            ]
        },
      });

  });
}

</script>
    
  </body>
</html>
