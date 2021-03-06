
<script language="JavaScript">
//function to check & uncheck all the elements
    function toggle(source) {
          checkboxes = document.getElementsByName('attendanceRecords[]');
          check1=document.getElementsByClassName('btn');
          for(var i=0, n=checkboxes.length;i<n;i++) {
              checkboxes[i].checked = source.checked;
            }
                                                    
  
        if(document.getElementById("check").innerHTML == "Uncheck All") { 
            document.getElementById("check").innerHTML = "Check All";
            var x=document.getElementsByName('chk');
            for (i = 0; i < x.length;i++)
                x[i].setAttribute("class", 'far fa-circle');
            for(var i=0,n=checkboxes.length;i<n;i++)
                check1[i].className = 'btn btn-danger active';
        }       
        else{
            document.getElementById("check").innerHTML = "Uncheck All";
            var x=document.getElementsByName('chk');
            for (i = 0; i < x.length; i++)
                x[i].setAttribute("class", 'fas fa-check-circle');    
            for(var i=0,n=checkboxes.length;i<n;i++)        
                    check1[i].className = 'btn btn-success active';
        }
}

</script>

<script type="text/javascript">
  jQuery(document).ready(function($) {

      if (window.history && window.history.pushState) {

        $(window).on('popstate', function() {
          var hashLocation = location.hash;
          var hashSplit = hashLocation.split("#!/");
          var hashName = hashSplit[1];

          if (hashName !== '') {
            var hash = window.location.hash;
            if (hash === '') {
              //alert('Back button was pressed.');
                window.location='class_selector';
                return false;
            }
          }
        });

        window.history.pushState('forward', null, './#forward');
      }

    });
</script>

<head>
<link href="<?php echo base_url(); ?>css/table.css" rel="stylesheet" type="text/css">
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
</head>

<body>
<center>
<div class="col-md-10"><br>
  <form action="<?php echo base_url(); ?>index.php/edit_attendance_save" method="post">
     <input type="hidden" name="classdetail" value="<?php echo $classdetail; ?>">
     <input type="hidden" name="subjectdetail" value="<?php echo $subjectdetail; ?>">
     <input type="hidden" name="batch" value="<?php echo $batch; ?>">
      <div class="form-group form-inline">
          <label for="example-date-input" class="col-form-label">Date</label>
          <div class="col-md-3 col-sm-8">
               <input class="form-control" type="date"  value="<?php echo $date;?>" name="date" required>
          </div>
      </div> 

      <div class="card-block">
        <blockquote class="card-blockquote">
            <div class="col-md-4"></div>
            <div class="container border border-success">
              <div id="no-more-tables">
                <table style="width:100%">
                  <?php echo $list; ?>
                </table>
              </div>
            </div>
            <br><br>
        </blockquote>
      </div>

      <button type="submit" class="btn btn-primary btn-lg">Save</button>
      
  </form>
</div>
</center>
<script src="<?php echo base_url(); ?>js/apbutton.js"></script>
</body>
</html>
