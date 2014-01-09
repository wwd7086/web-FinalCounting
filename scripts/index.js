////start initialize
$(function()
  {
    //add the slider
    $("#timeslider").slider({
      max:9, min:0, step:1,
      slide: eraseMonth,
      change: refreshMonth});

    //add the button
    $("button").button();

    //initial the list
    viewList("2013", "12");
  }
);

////functions for viewRequest
var viewXML;
var viewXSL;

function viewList(year, month)
{
  //remove old list
  $("#lists").hide(400, function(){
    $("this").empty();
    fetchList(year, month);
  });
}

function fetchList(year, month)
{
  //fetch the xml
  $.ajax({
    url: "viewRequest.php",
    data: {year:year, month:month},
    type: "GET",
    dataType : "xml",

    success: function(xml){
      //fetch the xsl
      viewXML=xml;

      if(!viewXSL)
      {
        $.ajax({
          url: "viewRequest.xsl",
          type: "GET",
          dataType : "xml",

          success: function(xsl){
            viewXSL=xsl;
            refreshList(viewXML, viewXSL);
          },
     
          error: function( xhr, status ){
            alert( "problem fetching xsl!" );
          },
        });
      }
      else
      {
        refreshList(viewXML, viewXSL);
      }
    },
 
    error: function( xhr, status ){
      alert( "problem fetching xml!" );
    },
 
  });
}

function refreshList(xml, xsl)
{
  xsltProcessor=new XSLTProcessor();
  xsltProcessor.importStylesheet(xsl);
  resultDocument = xsltProcessor.transformToFragment(xml,document);

  //add new list
  $("#lists").html(resultDocument).show(350);

  //add new cost
}

////event handlers for ui

//slider
function refreshMonth()
{
  //refresh the ui
  var month = $("#timeslider").slider("value");
  $("#months>div").attr("class","smonth");
  $("#months>div").eq(month).addClass("bmonth",300);

  //refresh the list
  month = 12 - month; //month is the current month
  var year=2013; //year is the current year

  viewList(year, month);
}

function eraseMonth()
{
  var month = $("#timeslider").slider("value");
  $("#months>div").removeClass("bmonth",300);
}