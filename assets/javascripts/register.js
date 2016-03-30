/**
 * Created by robin on 3/29/16.
 */

ajax("ajax/actions/countries.php",function(data){
    var html = "";
    for (var i in data){
        country = data[i];
        html += '<option value="'+i+'">'+country+'</option>';
    }

    $(".country-selector").innerHTML = html;
});