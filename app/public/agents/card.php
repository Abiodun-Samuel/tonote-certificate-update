<?php require_once('../../../private/initialize.php');

$page = 'Agents';
$page_title = 'All Agents';
// include(SHARED_PATH . '/admin_header.php'); 
$id = $_GET['id'] ?? "";

$agent = Agent::find_by_agent_id($id);

?>
<script src="<?php echo url_for('assets/js/jquery.min.js') ?>"></script>
<script src="<?php echo url_for('assets/js/jquery_qrcode.min.js') ?>"></script>
<!-- <script type="text/javascript" src="jquery.qrcode.min.js"></script> -->
<style type="text/css">
    .container{
        text-align: center;
        height: 50vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .name{
        font-size: 24px;
        padding: 20px;
    }
</style>

<div class="container">
    <div>
        <!-- <div id="qrcode"></div> -->
        <div id="qrcode"></div>
        <div class="name">
            <table>
                <tr>
                    <td>Name:</td>
                    <td><?php echo Agent::find_by_agent_id($id)->full_name() ?></td>
                </tr>
                <tr>
                    <td>ID:</td>
                    <td><?php echo $id ?></td>
                </tr>
            </table>
                
        </div>
       
    </div>
    
</div>

<input type="hidden" id="agent_id" value="<?php echo $id ?>">
<script type="text/javascript">
    var agent_id = $('#agent_id').val();
    $('#qrcode').qrcode(
    {
        text: "https://gettonote.com?id=" + agent_id,
        size: 300,
        // text: "https://gettonote.com#solutions"
    });
    // $(document).ready(function() {
    //      setTimeout(function(){
    //          window.print(); 
    //      }, 1000);//wait 1 seconds
         
    //      setTimeout(function(){
    //          window.close();
    //      }, 1000);//wait 1 seconds
    //   });
</script>











