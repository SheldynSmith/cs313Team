<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form id="form" name="form" action="week03b.php" method="POST">
        User Name:<br>        
        <input type="text" id="user-name" name="user-name"><br>
        Email:<br>        
        <input type="text" id="email" name="email"><br>
        <?php
            $majors = array("Computer Science", "Web Design and Development", "Computer information Technology", "Computer Engineering");
            
        
        foreach($majors as $m) {   
           echo "<input type=\"radio\" id=\"CS\" name=\"major\" value=".$m. ">".$m."<br>"; 
        }
        ?>  
        <input type="textarea" name="comment" id="comment"><br>
        <input type="checkbox" name="continent[]" id="north-america" value="NA">North America<br>
        <input type="checkbox" name="continent[]" id="south-america" value="SA">South America<br>
        <input type="checkbox" name="continent[]" id="europe" value="EU">Europe<br>
        <input type="checkbox" name="continent[]" id="asia" value="AA">Asia<br>
        <input type="checkbox" name="continent[]" id="australia" value="AU">Australia<br>
        <input type="checkbox" name="continent[]" id="africa" value="AF">Africa<br>
        <input type="checkbox" name="continent[]" id="Antarctica" value="AN">Antarctica<br>
        <input type="submit" name="submit" id="submit" value="Submit"><br>
    </form>
</body>
</html>