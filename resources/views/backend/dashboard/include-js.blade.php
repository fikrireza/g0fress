<script type="text/javascript">
window.onload = function () {
  
  // for anal FB
  var urlGetJson =  "{{ route('analytics.getFB') }}";

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
  // end for anal FB

  // for anal GA
  var urlGetJsonGA =  "{{ route('analytics.getGA') }}";
  
  $.getJSON(urlGetJsonGA, function (json) {

    // for MostVisitedPages
    var captionVarMVP = new Array();
    json.MostVisitedPages.map(function(item) {
      captionVarMVP.push(item.pageTitle + ' : ' + item.url);
    });

    var captionValMVP = new Array();
    json.MostVisitedPages.map(function(item) {
      captionValMVP.push(item.pageViews);
    });

    var cMVP = document.getElementById("chartMostVisitedPages");
    var barChartMostVisitedPages = new Chart(cMVP, {
        type: 'horizontalBar',
        data: {
          labels: captionVarMVP,
          datasets: [
              {
                label: "Visited Pages",
                data: eval(captionValMVP),
                backgroundColor : "rgba(255,0,0,.5)"
              }
            ]
        }
    });
    // end for MostVisitedPages

    // for TopBrowsers
    var captionVarTB = new Array();
    json.TopBrowsers.map(function(item) {
      captionVarTB.push(item.browser);
    });

    var captionValTB = new Array();
    json.TopBrowsers.map(function(item) {
      captionValTB.push(item.sessions);
    });

    var cTB = document.getElementById("chartTopBrowsers");
    var barChartTopBrowsers = new Chart(cTB, {
        type: 'horizontalBar',
        data: {
          labels: captionVarTB,
          datasets: [
              {
                label: "Top Browsers",
                data: eval(captionValTB),
                backgroundColor : "rgba(255,0,0,.5)"
              }
            ]
        }
    });
    // end for MostVisitedPages

    // for CityVisited
    var captionVarCV = new Array();
    var captionValCV = new Array();
    var intConfert = 1;
    $.each(json.CityVisited, function () {
      $.each(this, function (name, value) {
        if (intConfert%2 != 0) {
          captionVarCV.push(value);
        }
        if (intConfert%2 == 0) {
          if (value > 40) {
            captionValCV.push(value);
          }
          else if(value < 40){
            captionVarCV.splice(-1,1);
          }
        }
        intConfert = intConfert + 1;
      });
    });

    var cCV = document.getElementById("chartCityVisited");
    var barChartCityVisited = new Chart(cCV, {
        type: 'bar',
        data: {
          labels: captionVarCV,
          datasets: [
              {
                label: "City Visited",
                data: eval(captionValCV),
                backgroundColor : "rgba(255,0,0,.5)"
              }
            ]
        }
    });
    // end for CityVisited

    // for userVisited
    var captionVarUV = new Array();
    var captionValUVF = new Array();
    var captionValUVM = new Array();
    var safeGender = "";
    var intConfert = 1;
    $.each(json.userVisited, function () {
      $.each(this, function (name, value) {
        if (intConfert%2 == 0) {
          if ( $.inArray( value, captionVarUV ) > -1 ){
            // this value alredy in array
          }
          else{
            captionVarUV.push(value);
          }
        }
        if (intConfert%3 == 0) {
          if (safeGender == "female") {
            captionValUVF.push(value);
          }
          if (safeGender == "male") {
            captionValUVM.push(value);
          }
        }
        if (intConfert%2 != 0) {
          safeGender = value;
        }
        intConfert = intConfert + 1;
      });
      intConfert = 1;
    });

    var cUV = document.getElementById("chartUserVisited");
    var barChartUserVisited = new Chart(cUV, {
        type: 'bar',
        data: {
          labels: captionVarUV,
          datasets: [
              {
                label: "Female",
                data: eval(captionValUVF),
                backgroundColor : "rgba(255,0,0,.5)"
              },
              {
                label: "Male",
                data: eval(captionValUVM),
                backgroundColor : "rgba(0,0,255,.5)"
              }
            ]
        }
    });
    // end for userVisited

    // for VisitorWebsite
    var captionVarVW = new Array();
    var captionValVW = new Array();
    var intConfert = 1;
    $.each(json.VisitorWebsite, function () {
      $.each(this, function (name, value) {
        if (intConfert%2 != 0) {
          captionVarVW.push(parse(value));
        }
        if (intConfert%2 == 0) {
          captionValVW.push(value);
        }
        intConfert = intConfert + 1;
      });
    });

    console.log(captionVarVW);
        console.log(captionValVW);
    var cVW = document.getElementById("chartVisitorWebsite");
    var lineChartVisitorWebsite = new Chart(cVW, {
        type: 'line',
        data: {
          labels: captionVarVW,
          datasets: [
              {
                label: "Visitor Website",
                data: eval(captionValVW),
                backgroundColor : "rgba(255,0,0,.5)"
              }
            ]
        }
    });
    // end for VisitorWebsite

    var echoBounceRate = "";
    var echoAvgSessionDuration = "";
    $.each(json.bounceRate, function () {
      $.each(this, function (name, value) {
        echoBounceRate = Math.ceil(value) + '%';
      });
    });
        $("#wrapper-bounceRate").text(echoBounceRate);

    $.each(json.avgSessionDuration, function () {
      $.each(this, function (name, value) {
        echoAvgSessionDuration = value.toHHMMSS(); 
      });
    });
        $("#wrapper-avgSessionDuration").text(echoAvgSessionDuration);

  });
  // end for anal GA

}

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

function parse(str) {
  var y = str.substr(0,4),
      m = str.substr(4,2) - 1,
      d = str.substr(6,2);
      return new Date(y,m,d).toDateString("d F y");
}

String.prototype.toHHMMSS = function () {
  var sec_num = parseInt(this, 10); // don't forget the second param
  var hours   = Math.floor(sec_num / 3600);
  var minutes = Math.floor((sec_num - (hours * 3600)) / 60);
  var seconds = sec_num - (hours * 3600) - (minutes * 60);

  if (hours   < 10) {hours   = "0"+hours;}
  if (minutes < 10) {minutes = "0"+minutes;}
  if (seconds < 10) {seconds = "0"+seconds;}
  return hours+':'+minutes+':'+seconds;
}

</script>