<?php
    include($_SERVER['DOCUMENT_ROOT']."/livechat/application/connection/index.php");
    $hostname = getenv('HTTP_HOST');
    $sql = "SELECT * FROM `query_feedback` WHERE `type`='Query'";
    $result = mysqli_query($conn,$sql) or die("SQL Query error....!");
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            echo "
                <figure class='text-start'>
                    <figcaption>
                        <p>{$row['Query_Feedback']}</p>
                    </figcaption>
                    <figcaption class='blockquote-footer'>
                        <cite title='Source Title'>{$row['Answer']}</cite>
                    </figcaption>
                </figure>
            ";
        }
    }
?>