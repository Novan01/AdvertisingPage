<php?>

</script>
<body class="background_gray">
    <div class="container-fluid">
        <div class="container" style="width:100%;">
            <div class="row">
                <div class="col-md-12">
                    <h2>Marketing Status <!--<input type=text id="dateFinder"/>--></h2>
                    <a href="https://www.lawenforcementseminars.com/admin/class-marketing-past.php"><span class="newbutton">View Past Classes</span></a>
                    <div class="container" style="padding-bottom: 15px; font-size: 12px; width: 100%;">
                    	<div class="table-responsive">
                        <table id="example" class="display" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Type</th>
                            <th>Date</th>
                            <th>Location</th>
                            <th>Mailer</th>
                            <th>Round (Sent Date)</th>
                            <th>Fax</th>
							<th>Round (Sent Date)</th>
							<th>Email</th>
							<th>Round (Sent Date)</th>
                            <th>Flyer Sent to POC?</th>
							<th>CALEA (Sent Date)</th>
                    </thead>
                    <tfoot>
                        <tr>
							<th>Type</th>
                            <th>Date</th>
                            <th>Location</th>
                            <th>Mailer</th>
                            <th>Round (Sent Date)</th>
                            <th>Fax</th>
                            <th>Round (Sent Date)</th>
                            <th>Email</th>
                            <th>Round (Sent Date)</th>
                            <th>Flyer Sent to POC?</th>
                            <th>CALEA (Sent Date)</th>
                        </tr>
                    </tfoot>
                    <tbody>

                      <?php

						foreach($results as $result){
							echo "<tr row=" . $result['id'] . ">
                                <td>" . $result['typeSelect'] . "</td>
                                <td>" . $result['semDate'] ."</td>
                                <td>" . ($result['is_virtual']?strtok($result['dateSelect'], "-"):$result['genLocation']) ."</td>";
                                echo "<td><input type='checkbox' class='created' name='mailer_created' value='" . $result['mailer_created'] . "'/></td>";
                                echo "<td>Rnd 1 <input type='text' rows='2' cols='3' class='created date_input' name='mailer_sent_rnd1' value='" . $result['mailer_sent_rnd1'] . "'/><br>Rnd 2 <input type='text' rows='2' cols='3' class='created date_input' name='mailer_sent_rnd2' value='" . $result['mailer_sent_rnd2'] . "'/><br>Rnd 3 <input type='text' rows='2' cols='3' class='created date_input' name='mailer_sent_rnd3' value='" . $result['mailer_sent_rnd3'] . "'/>";
                                if($result['typeSelect'] == 'Background Investigations for Police Applicants' || $result['typeSelect'] == 'Internal Affairs Investigations')
                                    {
                                        echo "<br>MCH-Rnd 1 <input type='text' rows='2' cols='3' class='created date_input' name='mch_rnd_1' value='" . $result['mch_rnd_1'] . "'/><br>MCH-Rnd 2 <input type='text' rows='2' cols='3' class='created date_input' name='mch_rnd_2' value='" . $result['mch_rnd_2'] . "'/>";
                                    }
                                    echo "</td>";
                                echo "<td><input type='checkbox' class='created' name='fax_created' value='" . $result['fax_created'] . "'  /></td>";
                                echo "<td>Rnd 1 <input type='text' rows='2' cols='3' class='created date_input' name='fax_sent_rnd1' value='" . $result['fax_sent_rnd1'] . "'/><br>Rnd 2 <input type='text' rows='2' cols='3' class='created date_input' name='fax_sent_rnd2' value='" . $result['fax_sent_rnd2'] . "'/><br>Rnd 3 <input type='text' rows='2' cols='3' class='created date_input' name='fax_sent_rnd3' value='" . $result['fax_sent_rnd3'] . "'/><br>Rnd 4 <input type='text' rows='2' cols='3' class='created date_input' name='fax_sent_rnd4' value='" . $result['fax_sent_rnd4'] . "'/><br>Rnd 5 <input type='text' rows='2' cols='3' class='created date_input' name='fax_sent_rnd5' value='" . $result['fax_sent_rnd5'] . "'/><br>Rnd 6 <input type='text' rows='2' cols='3' class='created date_input' name='fax_sent_rnd6' value='" . $result['fax_sent_rnd6'] . "'/><br>Final <input type='text' rows='2' cols='3' class='created date_input' name='fax_sent_final' value='" . $result['fax_sent_final'] . "'/></td>";
                                echo "<td><input type='checkbox' class='created' name='email_created' value='" . $result['email_created'] . "'/></td>";
                                echo "<td>Rnd 1 <input type='text' rows='2' cols='3' class='created date_input' name='email_sent_rnd1' value='" . $result['email_sent_rnd1'] . "'/><br>Rnd 2 <input type='text' rows='2' cols='3' class='created date_input' name='email_sent_rnd2' value='" . $result['email_sent_rnd2'] . "'/><br>Rnd 3 <input type='text' rows='2' cols='3' class='created date_input' name='email_sent_rnd3' value='" . $result['email_sent_rnd3'] . "'/><br>Final <input type='text' rows='2' cols='3' class='created date_input' name='email_sent_final' value='" . $result['email_sent_final'] . "'/></td>";
                                echo "<td><input type='text' rows='2' cols='3' class='created date_input' name='poc' value='" . $result['poc'] . "'/></td><td>";

                                if($result['typeSelect'] == 'Background Investigations for Police Applicants')
                                {
                                    echo "Rnd 1<input type='text' rows='2' cols='3' class='created date_input' name='calea' value='" . $result['calea'] . "'/><br>";
                                    echo "Rnd 2<input type='text' rows='2' cols='3' class='created date_input' name='calea2' value='" . $result['calea2'] . "'/>";
                                }
                               
                                echo "</tr>";

					   }
            			?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
</body>
</html>
