<?php
function echotr(){
    $x=Db::view('group')->where('id',1)->select();
     dump($x);
    
//    echo "<tr>
//                                            <td>.{$row.Gname}.</td>
//                                            <td>System Architect</td>
//                                            <td>Edinburgh</td>
//                                            <td>61</td>
//                                          <td>61</td>
//                                        </tr>";
}
?>