<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
// $(document).ready(function(){
//   $("button").click(function(){
//     $.ajax({
//    url: 'price.php',
//    data: {value: $('#select option:selected').val()},
// });
//     // $.ajax({url: "price.php", success: function(result){
//     //   $("#div1").html(result);
//     // }});
//   });
// });

// $.ajax({
//    url: 'price.php',
//    data: {value: $('#select option:selected').val()},
// });
</script>
</head>
<body>

<div id="div1"><h2>Let jQuery AJAX Change This Text</h2></div>

<button>Get External Content</button>

</body>
</html>
<html>
<head>
<script>
function showHint(str) {
    if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "search.php?item=" + str, true);
        xmlhttp.send();
    }
}

</script>
</head>
<body>

<p><b>Start typing a name in the input field below:</b></p>
<form>
First name: <input type="text" onkeyup="showHint(this.value)">
</form>
<p>Suggestions: <span id="txtHint"></span></p>
</body>
</html>
