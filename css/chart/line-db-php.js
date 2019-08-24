$(document).ready(function() {

  /**
   * call the data.php file to fetch the result from db table.
   */

  $.ajax({
    url : "http://localhost:8080/dhqtmg/login/get_chart",
    type : "GET",
    // dataType:'json',
    success : function(data){
      console.log(data);
      
      var score = {
        FM_OPD : [],
        SM_OPD : [],
        FF_OPD :[]
      };
     
      var len = data.length;
    
      // for (var i = 0; i < len; i++) {
      //   if (data[i].type == "fm_opd") {
         
      //       score.FM_OPD.push(data[i].no);
      //   }
      //   else if (data[i].type == "sm_opd") {
         
      //     score.SM_OPD.push(data[i].no);
      //   }
      // }
      // $.each(data,function(index,item){
      //   alert(item.nom);
      // })

       score.FM_OPD.push(data[0].no);

       score.SM_OPD.push(data[1].nom);
       score.FF_OPD.push(data[2].nome);
      
      //get canvas
      var ctx = $("#line-chartcanvas");

      var data = {
        labels :["First Male OPD","2nd Male OPD","1st Female OPD"],
        datasets : [
          {
            label : "Today's OPD",
            data : [score.FM_OPD,score.SM_OPD,score.FF_OPD],
            backgroundColor :[
                       "rgba(255,99,132,0.2)",
                       "#E3EFFB",
                       "#C6F5C5"
                ],
            borderColor : [
                        "rgba(255,99,132,1)",
                        "#155595",
                        "#25BE21"
                          ],
            hoverBackgroundColor:[
                           "rgba(255,99,132,0.4)",
                           "#B0D2F4", 
                           "#A5EFA3" 
                                  ],
            hoverBorderColor:[
                            "rgba(255,99,132,1)",
                            "#155595",
                             "#25BE21"
                              ],
            fill : false,
            borderWidth:2,
            lineTension : 0,
          },
          // {
          //   label : "2nd Male OPD",
          //   data : score.SM_OPD,
          //   backgroundColor : "green",
          //   borderColor : "lightgreen",
          //   fill : false,
          //   lineTension : 0,
          //   pointRadius : 20
          // }
        ]
      };

      var options = {
        title : {
          display : true,
          position : "top",
          text : "Graphically Representing Daily OPD",
          fontSize : 18,
          fontColor : "#111"
        },
        legend : {
          display : true,
          position : "bottom"
        },
        scales:{
          yAxes:[{
            stacked:true,
            gridLines:{
              display:true,
              color:"rgba(255,99,132,2)"
            }
          }]
        }
      };

      var chart = new Chart( ctx, {
        type : "bar",
        data : data,
        options : options
      } );

    },
    error : function(data) {
      console.log(data);
    }
  });

});