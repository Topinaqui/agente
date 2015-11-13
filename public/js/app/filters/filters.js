eUBS.filter('strHora', function($filter)
{
 return function(input)
 {
  if(input == null){ return ""; } 
 
  var hora = input.substr(0, input.lastIndexOf(":"));

  if ( parseInt(hora.split()[0]) >= 12) {
  	hora += " PM";  
  } 
  else {
  	hora += " AM";
  }

  return hora;

 };
});
