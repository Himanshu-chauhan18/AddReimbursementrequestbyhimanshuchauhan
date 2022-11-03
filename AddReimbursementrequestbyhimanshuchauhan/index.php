<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reimbursement</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="./css/jquery-ui.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
</head>

<body>


    <div id="table-data">
        <h3>All Records</h3>
        <table border="1" width="100%" cellspacing="0" cellpadding="10px">
            <thead>
                <tr>
                    <th width="60px">Id</th>
                    <th>Employee</th>
                    <th>Department</th>
                    <th width="90px">ADD</th>
                </tr>
            </thead>
            <tbody id="tbody"></tbody>
        </table>
    </div>

    <div id="error-message"></div>
    <div id="success-message"></div>
    </div>


    <!-- insert -->

    <!-- modal for show add new -->
    <div id="addModal">
        <div id="modal-form">
            <h2>Add New Form</h2>
            <form method="POST" id="addModal-form" name="myForm">
                <table cellpadding="10px" width="100%" id="add-form">
                    <tr>
                        <td width='90px'>Employee Name</td>
                        <td><input type='text' id='fname'></td>
                    </tr>
                    <tr>
                        <td width='90px'>From date</td>
                        <td><input type='text' id='lname'></td>
                    </tr>
                    <tr>
                        <td width='90px'>To Date</td>
                        <td>
                            <select id="classlist"></select>
                        </td>
                    </tr>
                    <tr>
                        <td width='90px'>Description</td>
                        <td>
                            <select id="classlist"></select>
                        </td>
                    </tr>
                    >
                    <tr>
                        <td></td>
                        <td><button type="button" onclick='submit_data()' id='new-submit'>Save</button></td>
                    </tr>
                </table>
            </form>
            <div id="close-btn" onclick="hide_modal()">X</div>
        </div>
    </div>




    <!-- modal for show edit -->
    <div id="modal">
        <div id="modal-form">
            <h2>Add Reimbursement</h2>
            <form method="POST" id="myForm" action="./php/fetch-insert.php">
                <table cellpadding="10px" width="100%" id="edit-form">
                    <tr>
                        <td width='90px'>Employee Name</td>
                        <td><input type='text' id='edit-fname' autocomplete="off" required disabled>
                            <input type='text' id='edit-id' name="id" hidden>
                        </td>
                    </tr>

                    <tr>
                        <td width='90px'>From date</td>
                        <td><input type='text' id='from' name="from" autocomplete="off" ></td>
                    </tr>

                    <tr>
                        <td width='90px'>To Date</td>

                        <td><input type='text' id='to' name="to" autocomplete="off" ></td>

                    </tr>

                    <tr>
                        <td width='90px'>Description</td>
                        <td>
                            <input type='text' id='description' name="desc" autocomplete="off" >
                        </td>
                    </tr>
                    <tr>
                        <th width='90px'>Date</th>
                        <th width='90px'>Head</th>
                        <th width='90px'>Amount</th>

                        <tr>


                            <tr>
                                <td>
                                    <input type='text' class='datepicker' name="date1" autocomplete="off" >
                                </td>
                                <td>
                                    <input type='text' id='head1' name="head1" autocomplete="off" onkeyup="this.value=this.value.replace(/[^a-zA-Z]/g,'');"  class="alphaonly">
                                </td>
                                <td>
                                    <input type='text' id='amount1' name="amount1" autocomplete="off" oninput="add_number()" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" >
                                </td>
</tr>
                                    <tr>
                                        <td>
                                            <input type='text' name="date2" class='datepicker' autocomplete="off" >
                                        </td>
                                        <td>
                                            <input type='text' id='head2' name="head2" autocomplete="off" onkeyup="this.value=this.value.replace(/[^a-zA-Z]/g,'');"  class="alphaonly">
                                        </td>
                                        <td>
                                            <input type='text' id='amount2' name="amount2" autocomplete="off" oninput="add_number()" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" >
                                        </td>
                                        <tr>
                                            <tr>
                                                <td>
                                                    <input type='text' name="date3" class='datepicker' autocomplete="off" >
                                                </td>
                                                <td>
                                                    <input type='text' id='head3' name="head3" autocomplete="off" onkeyup="this.value=this.value.replace(/[^a-zA-Z]/g,'');"  class="alphaonly">
                                                </td>
                                                <td>
                                                    <input type='text' id='amount3' name="amount3" autocomplete="off" oninput="add_number()" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" >
                                                </td>
                                                <tr>
                                                    <td>
                                                        <input type='hidden'>
                                                    </td>
                                                    <td>
                                                        <input type='hidden'>Total:
                                                    </td>
                                                    <td>
                                                  
                                                    <input type='text' id='total'  autocomplete="off" required disabled>

                                                    </td>
                                                    <tr>

                                                        <tr>
                                                            <td></td>
                                                            <td><button type="submit" name="submit" value="submit" class="edit-btn">ADD REIMBURSEMENT</button></ </tr>
                </table>
            </form>
            <div id="close-btn" onclick="hide_modal()">X</div>
        </div>
    </div>




    <script type="text/javascript" src="./js/fetch.js"></script>
    <script src="./js/calander.js"></script>


    <script>
     
        var text1 = document.getElementById("amount1");
        var text2 = document.getElementById("amount2");
        var text3 = document.getElementById("amount3");

        function add_number() {

            var first_number = parseFloat(text1.value);
            if (isNaN(first_number)) first_number = 0;
            var second_number = parseFloat(text2.value);
            if (isNaN(second_number)) second_number = 0;
            var third_number = parseFloat(text3.value);
            if (isNaN(third_number)) third_number = 0;
            var result = first_number + second_number + third_number;

            document.getElementById("total").value = result;
          
        }
        $('.alphaonly').bind('keyup blur',function(){ 
    var node = $(this);
    node.val(node.val().replace(/[^a-zA-Z]/g,'') ); }
);
    </script>

</body>

</html>