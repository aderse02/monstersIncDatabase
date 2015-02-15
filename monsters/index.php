<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Monster's Inc Database</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="js/functions.js"></script>
<link rel="stylesheet" type="text/css" href="../css/default.css">
</head>
<body>
    <div id="mainBody">
    <table width="100%">
    	<tr>
        	<td style="vertical-align:top;">
            	<div id="populatedMonsters">
                    <select id="monsterId">
                        <option value="0"> </option>
                        <?php
                            $conn = new mysqli("localhost", "root", "", "phpprojects");
                            if ($conn->connect_errno) {
                                echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                            }
                            
                            $sql = 'SELECT * FROM monsters ORDER BY firstName ASC';
                             
                            $rs = $conn->query($sql);
                              
                            if($rs === false) {
                              echo trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
                            } else {
                              while($r = mysqli_fetch_assoc($rs)) {
                                  $id = $r['id'];
                                  $firstName = $r['firstName'];
                                  $lastName = $r['lastName'];
                                  
                                  echo "<option value='".$id."'>".$firstName. " " .$lastName. "</option>";
                              }
                            }
                        ?>
                    </select>
                    <br /><br />
                    <div id="responseText"></div>
            	</div>
            </td>
            <td width="20%">
            	<div id="addMonsters">
                    <form>
                    <fieldset>
                    <legend>Add Monster:</legend>
                    <table>
                    	<tr>
                        	<td>First Name: </td><td><input type="text" id="monsterFirstName" name="monsterFirstName" /></td>
                        </tr>
						<tr>
                        	<td>Last Name: </td><td><input type="text" id="monsterLastName" name="monsterLastName" /></td>
                        </tr>
                        <tr>
                        	<td>BirthDate: </td><td><input type="text" id="monsterBirthDate" name="monsterBirthDate" /></td>
                        </tr> 
                        <tr>
                        	<td></td><td><input type="button" id="addMonsterButton" name="addMonsterButton" value="Add Monster"/></td>
                        </tr>                     	
                    </table>
                    </fieldset>
                    </form>
                    <div id="addMonsterResponse"></div>
                </div>
            </td>
        
    </div>
    <div id="footer">
    
    </div>
</body>
</html>
