$projectId=$row['id'];
                  $sql1="SELECT issue_id FROM issues WHERE project_id=$projectId";
                  $stm1=$conn->prepare($sql1);
                  $stm1->execute();
                  $count=$stm1->fetchColumn();
  
                  $sql="UPDATE projects SET issues='$count' WHERE project_id=$projectId";
                  $stm=$conn->prepare($sql);
                  $stm->execute();