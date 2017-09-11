<?php
	/* 	Author: Akhilesh Kumar
   		Model for Communication platform
 	*/

   	class Comms_model extends CI_model
   	{
         /*
         Function to save Question Data to database in forum_questions table.
         */
   		public function saveQuestion($question)
   		{
   			$data=array(
   				'question' => $question);
   			return $this->db->insert('forum_questions',$data);
   		}
         /*
         Function to save question and corrosponding user id in forum_user_questions table.
         */
         public function saveUserQuestions($cid,$qid)
         {
            $data=array('cid'=>$cid,'qid'=>$qid);
            return $this->db->insert('forum_users_questions',$data);
         }
         /*
         Function to get all the unique tags from the database for tagging purposes. Tables from which tags
         are retreived are college, NODE_NAME and NODE_VALUE from table2.
         */
   		public function getTags()
   		{
   			return $this->db->query('select DISTINCT COLL_NAME as tags from college UNION select DISTINCT NODE_VALUE as tags from table2 where NODE_VALUE is NOT NULL UNION select DISTINCT NODE_NAME as tags from table2 where NODE_NAME is NOT NULL');
   		}
         //Function to get all tags and thier synonyms from the synonyms table.
         public function getAllSynonyms()
         {
            return $this->db->query("select * from synonyms");
         }
         /*
         Function to save ques id and corrosponding tag in forum_tags table in the database.
         */
   		public function saveTags($qid,$tag)
   		{
   			$data=array('qid'=>$qid,'tags'=>$tag);
   			return $this->db->insert('forum_tags',$data);
   		}

         /*
         Function to check whether the user have viewed the question and has done some activity on opening the questions or the user haven't viewed the question
         */
         public function checkForUserActivity($qid,$cid)
         {
            return $this->db->query("select * from nikhil_log_table where TEXT like '%".$qid."%' and CID=".$cid." and ACTION IN (1,2,3,4,5)");
         }

         /*
         Function to get all the questions that are not visited, asked, upvited by the user. Then rank questions is 
         called in the main controller to sort them according to their trendiness.
         */
         public function getTrendingQuestions($cid)
         {
            $questions=$this->db->query('select * from forum_questions');
            $trendingQuestions=array();
            foreach ($questions->result() as $key) {
               array_push($trendingQuestions,$key->qid);
            }
            $questions=array();
            foreach ($trendingQuestions as $key) 
            {
               $data=$this->getQuestionData($key);
               foreach ($data->result() as $row) 
               {
                  array_push($questions, $row);
               }
            }
            return $questions;
         }

         /*
         Function to get all the relevant questions for the users based on his tags. Tags are generated using his profile and activity on our application. 
         Functions take total tags and a number as input n and forms every combination of n tags and checks whether the question has all the n tags or not. Iteratively, n is decreased to 1 and questions are retrieved in a relevant order.
         */
         public function getRelevantQuestions($tags,$tags_number)
         {
            $query="";
            $total_tags=count($tags);
            $i=$tags_number;
            for($j=0;$j<$total_tags;$j++)
            {
               $query_tags=array_slice($tags, $j,$i);
               if($j+$i > $total_tags)
               {
                  $remaining_tag=count($query_tags);
                  $more_tags=array_slice($tags,0,$i-$remaining_tag);
                  $query_tags=array_merge($query_tags,$more_tags);
               }
               $subquery="select qid from forum_tags where tags in (";
               for($k=0;$k<$i;$k++)
               {
                  if($k==($i-1))
                  {
                     $subquery=$subquery."'".$query_tags[$k]."'";
                  }
                  else
                  {
                     $subquery=$subquery."'".$query_tags[$k]."',";
                  }
               }
               if(($i!=$total_tags && $j==($total_tags-1))||$i==$total_tags)
               {
                  $subquery=$subquery.") group by qid having count(qid) = ".$i;
                  $query=$query.$subquery;
               }
               else
               {
                  $subquery=$subquery.") group by qid having count(qid) = ".$i." UNION ";
                  $query=$query.$subquery;
               }
               if($i==$total_tags)
               {
                  break;
               }
            }
            return $this->db->query($query);
         }

         /*
         Gets the user information given his/her email id.
         */
         public function getUserData($mail)
         {
            return $this->db->query('select * from users where email="'.$mail.'"');
         }
         /*
         Gets all the Questions of a particular user.
         Input: User id
         Output: returns all the questions of that particular user
         */
         public function getUserQuestions($cid)
         {
            return $this->db->query('select q.*,v.*,q.upvotes-q.downvotes as total_votes from forum_questions q INNER JOIN forum_question_views v ON v.qid=q.qid INNER JOIN forum_users_questions uq on uq.qid=q.qid where uq.cid='.$cid);
         }

         /*
         Gets all the Questions of a particular user in a sorted order based on total votes
         Input: User id
         Output: returns all the questions of that particular user
         */
         public function getUserQuestionsOrdered($cid)
         {
            return $this->db->query('select q.*,v.*,q.upvotes-q.downvotes as total_votes from forum_questions q INNER JOIN forum_question_views v ON v.qid=q.qid INNER JOIN forum_users_questions uq on uq.qid=q.qid where uq.cid='.$cid.' ORDER BY total_votes DESC');
         }

         public function getTopQuestions()
         {
            return $this->db->query('select q.*,v.*,q.upvotes-q.downvotes as total_votes from forum_questions q INNER JOIN forum_question_views v ON v.qid=q.qid INNER JOIN forum_users_questions uq on uq.qid=q.qid ORDER BY total_votes DESC LIMIT 3');
         }

         /*
         Gets all the Answers with their respective Questions of a particular user.
         Input: User id
         Output: returns all answers with questions of that particular user
         */
         public function getUserAnswers($id)
         {
            return $this->db->query('select q.qid,q.question,q.cr_dt,q.up_dt,a.*,u.id,u.Display_Name from forum_questions q, forum_questions_answers qa INNER JOIN users u on u.id=qa.cid, forum_answers a where q.qid=qa.qid and a.ansid=qa.ansid and qa.cid='.$id);
         }

         /*
         Gets all the Answers with their respective Questions of a particular user in a sorted order based on total votes
         Input: User id
         Output: returns all answers with questions of that particular user
         */
         public function getUserAnswersOrdered($id)
         {
            return $this->db->query('select q.*,a.* from forum_questions q, forum_questions_answers u, forum_answers a where q.qid=u.qid and a.ansid=u.ansid and u.cid='.$id.' ORDER BY q.upvotes - q.downvotes DESC');
         }
         /*
         Gets all the answer related data for a particular user
         */
         public function getAnswerData($aid)
         {
            return $this->db->query('select a.*,u.Display_Name,u.id,a.upvotes-a.downvotes as total_votes from forum_answers a INNER JOIN forum_questions_answers qa on qa.ansid=a.ansid INNER JOIN users u on u.id=qa.cid where a.ansid='.$aid);
         } 
         /*
         Gets all the question related data(upvotes, downvotes, views, created by, comments)
         Input: Question ID
         */
         public function getQuestionData($qid)
         {
            return $this->db->query('select q.*,v.*,u.Display_Name,u.id,q.upvotes-q.downvotes as total_votes from forum_questions q INNER JOIN forum_question_views v ON v.qid=q.qid INNER JOIN forum_users_questions uq on uq.qid=q.qid INNER JOIN users u on u.id=uq.cid where q.qid='.$qid);
         }

         /*
         Gets all the answer related data(upvotes, downvotes, views, created by, comments) and is sorted according to confidence sorting.

         Input: Customer ID, Question ID and Rank (For the first three answers, rank passed will be -1 and for the rest answers, rank willbe some value)
         Output: Outputs all theanswers in a sorted order based on a formula and few conditions:
         Formula is: rank= ((positive + 1.9208) / (positive + negative) - 
                   1.96 * SQRT((positive * negative) / (positive + negative) + 0.9604) / 
                          (positive + negative)) / (1 + 3.8416 / (positive + negative)) 
                          where positive and negatives are upvotes and downvotes respectively.
         Some fine tunings are:
         1) if the user has answered a question, then we need to display thta particular answer in the top 3 (if its rank itself is in top 3 then display as per rank, otherwise, insert it at 3rd position.
         2)how many answers to be shown? - show 3 answers (along with show more link) and expand to 10 more answers each time that link is clicked
         3) In case the user hasnt answered the question, the 3rd slot can be given to an answer which is having a low number of samples - i.e. low number of upvotes / downvotes (measured by recency as well). e.g. suppose there are 10 answers and a new answer came that has a default rank that is 5th. it will not be shown among the top 3. However, since our system reserves the 3rd spot for new answers and answers having very low up/down votes it will get a chance to be seen there and with more number of views we will get more upvotes/downvotes and will be in a position to decide on its relevance better. Hence, lets reserve the 3rd rank for a new answer (the newest) which does not have more than 3 downvotes and more than 5 votes overall (up+down). As soon as it completes 5 votes, it has to be ranked as per the algo and not via a reserved entry.
         The queries in the if part takes care of these conditions.
         */
         public function getAnswerDataNew($cid,$qid,$rank=-1)
         {
            $this->load->library('session');
            $answers=array();    //Array to store the main answers
            if($rank==-1)
            {
               $query1=$this->db->query('select a.*,ua.*,u.id,u.Display_Name,((a.upvotes + 1.9208) / (a.upvotes + a.downvotes) - 1.96 * SQRT((a.upvotes * a.downvotes) / (a.upvotes + a.downvotes) + 0.9604) / 
                  (a.upvotes + a.downvotes)) / (1 + 3.8416 / (a.upvotes + a.downvotes)) 
                  AS rank from forum_answers a INNER JOIN forum_questions_answers ua on a.ansid=ua.ansid INNER JOIN users u on u.id=ua.cid where ua.qid='.$qid." and a.upvotes + a.downvotes > 0 order by rank DESC LIMIT 2"); //Takes all the answers, sorts them according to rank and takes the top two answers
               
               $query2=$this->db->query('select a.*,ua.*,u.id,u.Display_Name from forum_answers a INNER JOIN forum_questions_answers ua on a.ansid=ua.ansid INNER JOIN users u on u.id=ua.cid where ua.qid='.$qid.' and ua.cid='.$cid." order by a.cr_dt DESC LIMIT 1");  //Query to select recent User answer(If any)

               $query3=$this->db->query('select a.*,ua.*,u.id,u.Display_Name from forum_answers a INNER JOIN forum_questions_answers ua on a.ansid=ua.ansid INNER JOIN users u on u.id=ua.cid where ua.qid='.$qid.' and a.upvotes+a.downvotes < 5 and a.downvotes < 3 order by a.cr_dt DESC LIMIT 1'); 
                  //Query to recent answer which has less then 5 votes
               

               if($query2->num_rows()!=0) //If there are any answer from the user
               {
                  foreach($query1->result() as $row) //Gets the top two answers, round their rank to fit PHP standards (14 digits) and store them in answer array and store thier ids in session to prevent redundancy
                  {
                     $row->rank=round($row->rank,14);
                     
                     //if(isset($this->session->answers))
                     //{
                        $ansarray=$this->session->userdata('answers'); //Pushing ids into session
                        array_push($ansarray, $row->ansid);
                        $this->session->set_userdata('answers',$ansarray);
                     //}

                     array_push($answers, $row);
                  }
                  foreach($query2->result() as $row) //Pushing user answer into the answer array.
                  {
                     if(!in_array($row->ansid, $this->session->answers))
                     {
                       
                        $ansarray=$this->session->answers;
                        array_push($ansarray, $row->ansid);
                        $this->session->set_userdata('answers',$ansarray);

                        array_push($answers,$row);
                     }
                  }
               }
               else if($query3->num_rows()!=0) //If there are no user answers, then questions with less than 5 vites are checked and same procedure is followed as above. 
               {     
                  foreach($query1->result() as $row)
                  {
                     $row->rank=round($row->rank,14);
                     
                     $ansarray=$this->session->answers;
                     array_push($ansarray, $row->ansid);
                     $this->session->set_userdata('answers',$ansarray);

                     array_push($answers, $row);
                  }
                  foreach($query3->result() as $row) //Pushing answer with less than 5 votes into the third slot
                  {
                     if(!in_array($row->ansid, $this->session->answers))
                     {
                        $ansarray=$this->session->answers;
                        array_push($ansarray, $row->ansid);
                        $this->session->set_userdata('answers',$ansarray);

                        array_push($answers,$row);
                     }
                  }
               }
               else if($query2->num_rows()==0 && $query3->num_rows()==0)// Else if there are no answers which are of user's or have less than 5 votes, then the query will run again and retrieve the top 3 answers with top ranks.
               {  
                  $query1=$this->db->query('select a.*,ua.*,u.*, ((a.upvotes + 1.9208) / (a.upvotes + a.downvotes) - 1.96 * SQRT((a.upvotes * a.downvotes) / (a.upvotes + a.downvotes) + 0.9604) / (a.upvotes + a.downvotes)) / (1 + 3.8416 / (a.upvotes + a.downvotes)) 
                  AS rank from forum_answers a INNER JOIN forum_questions_answers ua on a.ansid=ua.ansid INNER JOIN users u on u.id=ua.cid where ua.qid='.$qid." and a.upvotes + a.downvotes > 0 order by rank DESC LIMIT 3");
                  if($query1->result())
                  {
                     //If all the answers have 0 upvotes and downvotes, then formula will now work and then on the basis of the recency, top 3 answers will be retrieved and shown.
                     $query1=$this->db->query('select a.*,ua.*,u.* from forum_answers a INNER JOIN forum_questions_answers ua on a.ansid=ua.ansid INNER JOIN users u on u.id=ua.cid where ua.qid='.$qid." order by a.cr_dt DESC LIMIT 3");  
                  }
                  foreach($query1->result() as $row)
                  {
                     
                     $ansarray=$this->session->answers;
                     array_push($ansarray, $row->ansid);
                     $this->session->set_userdata('answers',$ansarray);

                     array_push($answers, $row);
                  }
               }
            }
            else  //If more answers are to be shown, then rank is passed and all the answer having ranks less than the rank provided will be sorted and shown.
            {
               $query1=$this->db->query('select a.*,ua.*,u.*, ((a.upvotes + 1.9208) / (a.upvotes + a.downvotes) - 1.96 * SQRT((a.upvotes * a.downvotes) / (a.upvotes + a.downvotes) + 0.9604) / 
                  (a.upvotes + a.downvotes)) / (1 + 3.8416 / (a.upvotes + a.downvotes)) 
                  AS rank from forum_answers a INNER JOIN forum_questions_answers ua on a.ansid=ua.ansid INNER JOIN users u on u.id=ua.cid where ua.qid='.$qid.' and a.upvotes + a.downvotes > 0 order by rank DESC LIMIT 10');
               if($query1->num_rows()!=0)
               {
                  foreach($query1->result() as $row)
                     {
                        $row->rank=round($row->rank,14);
                        if($row->rank<$rank)
                        {
                           if(!in_array($row->ansid, $this->session->answers))
                           {
                              array_push($answers, $row);
                              $ansarray=$this->session->answers;
                              array_push($ansarray, $row->ansid);
                              $this->session->set_userdata('answers',$ansarray);
                           }
                        }
                     }
               }
               //If there are less than 10 answers for which rank can be calculated, then the difference is calculated and that many answers are loaded based on recency.
               $num=count($answers);
               $num=(10-$num);
               $query1=$this->db->query('select a.*,ua.*,u.* from forum_answers a INNER JOIN forum_questions_answers ua on a.ansid=ua.ansid INNER JOIN users u on u.id=ua.cid where ua.qid='.$qid.' order by a.cr_dt DESC LIMIT '.$num);
               foreach($query1->result() as $row)
                  {
                     if(!in_array($row->ansid, $this->session->answers))
                     {
                        
                        $ansarray=$this->session->answers;
                        array_push($ansarray, $row->ansid);
                        $this->session->set_userdata('answers',$ansarray);

                        array_push($answers, $row);
                     }
                  }  
            }
            return $answers;
         }

         //Function to get the top rated answer of the question
         public function getTopRatedAnswer($qid,$cid)
         {
            $this->load->library('session');
            $answer=array();
            $this->session->set_userdata('answers',$answer);
            $answers=$this->getAnswerDataNew($cid,$qid);
            if(!empty($answers))
               return $answers[0];
         }

         //Gets the Question ID and the User Id for a particular answer.
         public function getAnswerDataUser($aid)
         {
            return $this->db->query('select * from forum_questions_answers where ansid='.$aid);
         }
         //Saves answer data to forum_answers table
         public function saveAnswer($answer,$aid)
         {
            $data=array('ansid'=>$aid,'answer' => $answer);
            return $this->db->insert('forum_answers',$data);
         }
         //Saves the user who have written the question and the corrosponding question to which answer is written. 
         public function saveUserAnswer($cid,$qid)
         {
            $data=array('cid'=>$cid,'qid'=>$qid);
            return $this->db->insert('forum_questions_answers',$data);  
         }
         public function incrementView($qid)
         {
            return $this->db->query('INSERT INTO forum_question_views (qid) VALUES ('.$qid.') ON DUPLICATE KEY UPDATE views =  views + 1');
         } 
         public function getViews($qid)
         {
            return $this->db->query('select * from forum_question_views where qid='.$qid);
         }
         public function saveUpvotes($qid)
         {
            return $this->db->query('update forum_questions set upvotes=upvotes+1 where qid='.$qid);
         }
         //In case of unvoting, count of upvotes decrements by 1.  
         public function rollbackUpvotes($qid)
         {
            return $this->db->query('update forum_questions set upvotes=upvotes-1 where qid='.$qid);
         }
         public function saveDownvotes($qid)
         {
            return $this->db->query('update forum_questions set downvotes=downvotes+1 where qid='.$qid);
         }
         public function rollbackDownvotes($qid)
         {
            return $this->db->query('update forum_questions set downvotes=downvotes-1 where qid='.$qid);
         }
         public function saveUpvotesAnswer($aid)
         {
            return $this->db->query('update forum_answers set upvotes=upvotes+1 where ansid='.$aid);
         }
         public function rollbackUpvotesAnswer($aid)
         {
            return $this->db->query('update forum_answers set upvotes=upvotes-1 where ansid='.$aid);
         }
         public function saveDownvotesAnswer($aid)
         {
            return $this->db->query('update forum_answers set downvotes=downvotes+1 where ansid='.$aid);
         }
         public function rollbackDownvotesAnswer($aid)
         {
            return $this->db->query('update forum_answers set downvotes=downvotes-1 where ansid='.$aid);
         }
         public function getTotalVotes($qid)
         {
            return $this->db->query('select upvotes-downvotes as total_votes from forum_questions where qid='.$qid);
         }
         public function getTotalVotesAnswer($aid)
         {
            return $this->db->query('select upvotes-downvotes as total_votes from forum_answers where ansid='.$aid);
         }
         //Gets all the tags which are present for a particular question
         public function getTagsQuestion($qid)
         {
            return $this->db->query('select * from forum_tags where qid='.$qid);
         }
         public function updateFollowPreference($qid,$cid)
         {
            return $this->db->query('INSERT INTO forum_user_follow_questions (cid,qid) VALUES ('.$cid.','.$qid.') ON DUPLICATE KEY UPDATE follow=1-follow');
         }
         //gets all the users id which are following a particular question for notification purposes.
         public function getUsers($qid)
         {
            return $this->db->query('select * from forum_user_follow_questions where qid='.$qid.' and follow=1');
         }
         //Get the User which have written a particular Question
         public function getUserByQuestion($qid)
         {
            return $this->db->query('select * from forum_users_questions where qid='.$qid);
         }
         public function saveNotification($cid,$notification,$qid,$aid,$doer,$activity)
         {
            $data=array(
               'cid'=>$cid,
               'notification'=>'"'.$notification.'"',
               'qid'=>$qid,
               'ansid'=>$aid,
               'doerid'=>$doer,
               'activity'=>$activity);
            return $this->db->insert('forum_notifications',$data);
         }
         public function getNotifications($cid)
         {
            return $this->db->query('select * from forum_notifications where cid='.$cid.' and unseen=1');
         }
         public function rollbackNotification($cid,$qid,$aid,$doer)
         {  
            return $this->db->query('update forum_notifications set unseen=0 where cid='.$cid.' and qid='.$qid.' and ansid='.$aid.' and doerid='.$doer.' and activity="UPVOTED"');
         }
         //Gets a query whether the user have votes or downvoted. If upvoted=1, then the user have upvoted the question, else if upvoted=0, then the user have downvoted the question. If no suck row exists, that means user have neither upvoted nor downvoted this question.
         public function getUserVoted($cid,$qid)
         {
            return $this->db->query('select * from forum_user_question_votes where cid='.$cid.' and qid='.$qid.' and voted=1');
         }
         //Save whether the user upvoted or downvoted the question
         public function saveUserVoted($cid,$qid,$flag)
         {
            return $this->db->query('INSERT INTO forum_user_question_votes (cid,qid,upvoted) VALUES ('.$cid.','.$qid.','.$flag.') on DUPLICATE KEY UPDATE voted=1');
         }

         public function getUserVotedAnswer($cid,$aid)
         {
            return $this->db->query('select * from forum_user_answer_votes where cid='.$cid.' and aid='.$aid.' and voted=1');
         }
         public function saveUserVotedAnswer($cid,$aid,$flag)
         {
            return $this->db->query('INSERT INTO forum_user_answer_votes (cid,aid,upvoted) VALUES ('.$cid.','.$aid.','.$flag.') on DUPLICATE KEY UPDATE voted=1');
         }
         //Gets whether the user is following the question or not.
         public function getFollowPreference($cid,$qid)
         {
            return $this->db->query('select * from forum_user_follow_questions where qid='.$qid.' and cid='.$cid);
         }
         //Gets all questions matching a particular string. This function is for search purposes. 
         public function getAllQuestions($data)
         {
            return $this->db->query("select * from forum_questions where question like '%$data%'");
         }
         //Gets all tags matching a particular string. This function is for search purposes.
         public function getAllTags($data)
         {
			
            return $this->db->query("select DISTINCT COLL_NAME , COLL_ID  from college where COLL_NAME like '$data%'");
			
         }
		
		 //Gets country matching a particular string. This function is for search purposes.
		 public function getCountry($data)
         {
            return $this->db->query("select DISTINCT Country_Code as country from Country where Country_Name like '%$data%'");
         }
		 
		   //Gets query matching a particular string from table search_home. This function is for search purposes.
		 public function getquery($data)
         {
            return $this->db->query("select *  from search_home where query LIKE '$data%' ");
         }
		  public function getquery_search($data)
         {
            return $this->db->query("select *  from search_home where query = '$data' ");
         }
	
         //Gets all the Questions that are tagged to a particular tag.
         public function getTagQuestion($tid)
         {
            return $this->db->query("select t.*,uq.*,u.id,u.Display_Name,q.*,qv.* from forum_tags t INNER JOIN forum_users_questions uq on uq.qid=t.qid INNER JOIN users u on u.id=uq.cid INNER JOIN forum_questions q on q.qid=uq.qid INNER JOIN forum_question_views qv on qv.qid=uq.qid where t.tags like '%$tid%' order by q.cr_dt DESC");
         }
         
         //Takes an array of tags and returns all the questions that are associated with those tags.
         public function getTagQuestionNew($tags) //$tags should be of array type. If it's a single value, pass the tag alone as parameter.
         {
            $query="";
            if(count($tags)==0)
            {
               return 0;
            }
            else if(count($tags)==1)
            {
               return $this->getTagQuestion($tags[0]);
            }
            else
            {
               $total_tags=count($tags);
               
               for($i=$total_tags;$i>0;$i--)
               {
                  for($j=0;$j<$total_tags;$j++)
                  {
                     $query_tags=array_slice($tags, $j,$i);
                     if($j+$i > $total_tags)
                     {
                        $remaining_tag=count($query_tags);
                        $more_tags=array_slice($tags,0,$i-$remaining_tag);
                        $query_tags=array_merge($query_tags,$more_tags);
                     }
                  //   echo '<br>';
                     $subquery="select qid from forum_tags where tags in (";
                     for($k=0;$k<$i;$k++)
                     {
                        if($k==($i-1))
                        {
                           $subquery=$subquery."'".$query_tags[$k]."'";
                        }
                        else
                        {
                           $subquery=$subquery."'".$query_tags[$k]."',";
                        }
                     }
                     if($i==1 && $j==($total_tags-1))
                     {
                        $subquery=$subquery.") group by qid having count(qid) = ".$i;
                        $query=$query.$subquery;
                     }
                     else
                     {
                        $subquery=$subquery.") group by qid having count(qid) = ".$i." UNION ";
                        $query=$query.$subquery;
                     }
                     if($i==$total_tags)
                     {
                        break;
                     }
                  }
               }
               return $this->db->query($query);
            }
         }


         public function unvoteQuestion($cid,$qid)
         {
            $this->db->query('update forum_user_question_votes set voted=0 where cid='.$cid.' and qid='.$qid.' and voted=1');
            return $this->db->affected_rows();
         }
         public function unvoteAnswer($cid,$aid)
         {
            $this->db->query('update forum_user_answer_votes set voted=0 where cid='.$cid.' and aid='.$aid.' and voted=1');
            return $this->db->affected_rows();
         }

         //Gets all the Questions upvotes by the user
         public function getUserVotedQuestions($cid)
         {
            return $this->db->query('select uqv.*,q.*,v.* from forum_user_question_votes uqv INNER JOIN forum_questions q on q.qid=uqv.qid INNER JOIN forum_question_views v on v.qid=uqv.qid where upvoted=1 and voted=1 and cid='.$cid);
         }
         //Gets all the Answers upvotes by the user
         public function getUserVotedAnswers($cid)
         {
            return $this->db->query('select uqa.*,a.*,qa.*,q.*,u.id,u.Display_Name from forum_user_answer_votes uqa INNER JOIN forum_answers a on a.ansid=uqa.aid INNER JOIN forum_questions_answers qa on qa.ansid=uqa.aid INNER JOIN forum_questions q on q.qid=qa.qid INNER JOIN forum_users_questions uq on uq.qid=qa.qid INNER JOIN users u on u.id=uq.cid where upvoted=1 and voted=1 and uqa.cid='.$cid);
         }
         public function makeNotificationRead($cid)
         {
            return $this->db->query('update forum_notifications set unseen=0 where cid='.$cid);
         }

         public function getUpvotes($qid)
         {
            return $this->db->query('select count(*) as upvotes from forum_user_question_votes where qid='.$qid.' and upvoted=1 and voted=1');
         }
         public function getDownvotes($qid)
         {
            return $this->db->query('select count(*) as downvotes from forum_user_question_votes where qid='.$qid.' and upvoted=0 and voted=1');
         }
         public function getUpvotesAnswer($aid)
         {
            return $this->db->query('select count(*) as upvotes from forum_user_answer_votes where aid='.$aid.' and upvoted=1 and voted=1');
         }
         public function getDownvotesAnswer($aid)
         {
            return $this->db->query('select count(*) as downvotes from forum_user_answer_votes where aid='.$aid.' and upvoted=0 and voted=1');
         }
         public function updateUpvotes($qid)
         {
            return $this->db->query('update forum_questions set upvotes=(select count(*) from forum_user_question_votes where qid='.$qid.' and upvoted=1 and voted=1) where qid='.$qid); 
         }
         public function updateDownvotes($qid)
         {
            return $this->db->query('update forum_questions set downvotes=(select count(*) from forum_user_question_votes where qid='.$qid.' and upvoted=0 and voted=1) where qid='.$qid); 
         }
          public function updateUpvotesAnswer($aid)
         {
            return $this->db->query('update forum_answers set upvotes=(select count(*) from forum_user_answer_votes where aid='.$aid.' and upvoted=1 and voted=1) where ansid='.$aid); 
         }
         public function updateDownvotesAnswer($aid)
         {
            return $this->db->query('update forum_answers set downvotes=(select count(*) from forum_user_answer_votes where aid='.$aid.' and upvoted=0 and voted=1) where ansid='.$aid); 
         }
         //Gets Whether user upvoted/downvotes this questions. If empty query is returned, means user have not voted at all.
         public function getVotedUser($cid,$qid)
         {
            return $this->db->query('select * from forum_user_question_votes where cid='.$cid.' and qid='.$qid.' and voted=1');
         }
         public function getVotedUserAnswer($cid,$aid)
         {
            return $this->db->query('select * from forum_user_answer_votes where cid='.$cid.' and aid='.$aid.' and voted=1');
         }
         //Gets all the users of a particular college
         public function getUserCollege($tag)
         {
            return $this->db->query("select DISTINCT t.cid from college c INNER JOIN table1 t on t.COLL_ID=c.COLL_ID where c.COLL_NAME like '%$tag%'");
         }
         //To check whether the tag is a particular college or not. 
         public function ifTagisCollege($tid)
         {
            return $this->db->query("select * from synonyms where synonym like '%$tid%'");
         }
         public function saveCommentsQuestion($cid,$qid,$comment)
         {
            $this->db->query('update forum_questions set comments=1 where qid='.$qid.' and comments=0');
            $this->db->insert('forum_question_comments',array('comment'=>$comment));
            //$this->db->query('INSERT INTO forum_question_comments (comment) VALUES ("'.$comment.'")');
            $commentid=mysql_insert_id();
            $this->db->insert('forum_user_question_comments',array('cid'=>$cid,'qid'=>$qid,'commentid'=>$commentid));
            //$this->db->query('INSERT INTO forum_user_question_comments (cid,qid,commentid) VALUES ('.$cid.','.$qid.','.$commentid.')');
         }
         public function saveCommentsAnswer($cid,$aid,$comment)
         {
            $this->db->query('update forum_answers set comments=1 where ansid='.$aid.' and comments=0');
            $this->db->insert('forum_answer_comments',array('comment'=>$comment));
            //$this->db->query('INSERT INTO forum_answer_comments (comment) VALUES ("'.$comment.'")');
            $commentid=mysql_insert_id();
            $this->db->insert('forum_user_answer_comments',array('cid'=>$cid,'aid'=>$aid,'commentid'=>$commentid));
            //$this->db->query('INSERT INTO forum_user_answer_comments (cid,aid,commentid) VALUES ('.$cid.','.$aid.','.$commentid.')');
         }
         public function getCommentsQuestion($qid)
         {
            return $this->db->query("select c.*,uc.*,u.id,u.Display_Name from forum_question_comments c INNER JOIN forum_user_question_comments uc on uc.commentid=c.commentid INNER JOIN users u on u.id=uc.cid where uc.qid=".$qid);
         }
         public function getCommentsAnswer($aid)
         {
            return $this->db->query("select c.*,uc.*,u.id,u.Display_Name from forum_answer_comments c INNER JOIN forum_user_answer_comments uc on uc.commentid=c.commentid INNER JOIN users u on u.id=uc.cid where uc.aid=".$aid);
         }
         //returns the user whose question or answer is to notify him
         public function getcommentQA($qid,$aid)
         {
            if($aid==-1)
               return $this->db->query("select * from forum_users_questions where qid=".$qid);
            else
               return $this->db->query("select * from forum_questions_answers where ansid=".$aid);
         }
         public function saveImage($qid,$aid,$name)
         {
            if($aid==-1)
            {
               $this->db->query('INSERT INTO forum_question_answer_image (qid,imagename) VALUES ('.$qid.',"'.$name.'")');
            }
            else
            {
               $this->db->query('INSERT INTO forum_question_answer_image (ansid,imagename) VALUES ('.$aid.',"'.$name.'")');
            }
         }
         public function getImage($qid,$aid)
         {
            if($aid==-1)
            {
               return $this->db->query("Select * from forum_question_answer_image where qid=".$qid);
            }
            else
            {
               return $this->db->query("select * from forum_question_answer_image where ansid=".$aid);
            }
         }

         /*
         Functions to get all the questions which the user have not answered or that questions are in accordance
         with user profile tags.
         Input: User id and tags which are build for a particular user.
         */
         public function getUnansweredQuestions($cid,$tag)
         {
            $query="";
            $totalTags=count($tag);    //counts the total number of tags.
            for($i=0;$i<$totalTags;$i++)
            {
               if($i==$totalTags-1)
               {
                  $subquery="select ft.qid from forum_tags ft INNER JOIN forum_questions_answers fqa on fqa.qid=ft.qid INNER JOIN forum_users_questions fqu on fqu.qid=ft.qid where ft.tags like '%".$tag[$i]."%' and fqa.qid NOT IN (select qid from forum_questions_answers where cid =".$cid." UNION select qid from forum_users_questions where cid = ".$cid.")";   //If it's the lat act, this query will  be last
               }
               else
               {
                  $subquery="select ft.qid from forum_tags ft INNER JOIN forum_questions_answers fqa on fqa.qid=ft.qid INNER JOIN forum_users_questions fqu on fqu.qid=ft.qid where ft.tags like '%".$tag[$i]."%' and fqa.qid NOT IN (select qid from forum_questions_answers where cid =".$cid." UNION select qid from forum_users_questions where cid = ".$cid.") UNION "; // If not, this query will be concatenated to the previous queries with UNION
               }
               $query=$query.$subquery;
            }
            $response=array();
            if(!empty($query))
            {   
               $questions=$this->db->query($query);   //Final query is build
               foreach($questions->result() as $key)
               {
                  array_push($response, $key->qid);     //They are all pushed in an array
               }
            }

            $questions=$this->db->query("select fq.qid,fq.cr_dt from forum_questions fq INNER JOIN forum_users_questions fuq on fq.qid=fuq.qid where fuq.cid <>".$cid." and fq.qid NOT IN (select DISTINCT qid from forum_questions_answers) order by fq.cr_dt DESC"); //All those questions are retrieved which have 0 answers and are sorted based on recency.
            $noansques=array();
            foreach($questions->result() as $key)
            {
               array_push($noansques, $key->qid);
            }

            $combinedresponse=array_unique(array_merge($response,$noansques)); //Both responses are merged and redundant quesids are removed
            $questionData=array();
            foreach ($combinedresponse as $key) {
               $query=$this->getQuestionData($key);   //gets question data for each question in the final array.
               foreach($query->result() as $data)
               {
                  array_push($questionData, $data);
               }
            }
            return $questionData;
         }
         //Gets all the questions followed by the user 
         public function getFollowingQuestions($cid)
         {
            $query=$this->db->query("select * from forum_user_follow_questions where cid=".$cid." and follow=1");
            $questions=array();
            foreach ($query->result() as $key) {
               $subquery=$this->getQuestionData($key->qid);
               foreach ($subquery->result() as $row) {
                  array_push($questions, $row);
               }
            }
            return $questions;
         }
         public function getFollowedQuestionUsers($qid)
         {
            return $this->db->query("select * from forum_user_follow_questions where qid=".$qid." and follow=1");
         }

         public function getQidAnswers($cid)
         {
            return $this->db->query("select qid from forum_questions_answers where cid=".$cid);
         }
		 
}
