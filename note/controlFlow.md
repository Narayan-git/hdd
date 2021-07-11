########################################################
track/control flow of web pages:
--------------------------------------
index.php // * starting page
    |->login.php // * login page if u use admin id then it goes admin section other wise it goes to user section //
    |       |
    |       |
    |       |->admin.php 
    |       |   |--> card1 is user section
    |       |   |   usersection.php
    |       |   |       |--->NewUserReg.php //for new Ueser Registration
    |       |   |       |--->user_update.php // for user user_update.php
    |       |   |       |--->userDelete.php //for delete user
    |       |   |
    |       |   |-->card 2 is Test section
    |       |   |   testDashBoard.php
    |       |   |       |--->card 2.1
    |       |   |       |   adminAllTestDetail.php // to show the all test details in the linebreaks
    |       |   |       |       |----> GenReport.php // to show and generate test report of the patient
    |       |   |       |       |           |----->GetReport.php // Print the report
    |       |   |       |--->card 2.2       
    |       |   |       |    adminPendingTest.php //to show all pending test cases
    |       |   |       |       |----> userDetail.php // check which users patient's test is pending
    |       |   |       |
    |       |   |       |--->card 2.3       
    |       |   |       |    adminTdTest.php // to show todays total test cases
    |       |   |       |       
    |       |   |       |--->card 2.4       
    |       |   |       |    adminTdPending.php // for to dispaly the todays pending test cases
    |       |   |       |       
    |       |   |       |--->card 2.5   
    |       |   |       |     adminViewTest.php // to manage the test and sub test details
    |       |   |       |        |---->adminManageSubTest.php //manage the subtests with taking parameter (test_id)
    |       |   |       |        |          |----->subTestDlt.php // to remove the sub test
    |       |   |       |        
    |       |   |-->card 3 Report Section
    |       |   |   reportDashBoard.php 
    |       |   |       |--->card 3.1
    |       |   |       |   adminAllReport.php
    |       |   |       |       |---->GenReport.php
    |       |   |       |       |           |----->GetReport.php
    |       |   |       |--->card 3.2           
    |       |   |       |    adminTdReport.php // for todays test report
    |       |   |       |       |---->GenReport.php
    |       |   |       |       |           |----->GetReport.php      
    |       |              
    |       |              
    |       |-->user.php //for user login hdduser table data user type 0              
    |       |   |--->card 1
    |       |   |    uPatientDashBoard.php // all patient manage section
    |       |   |       |---->card 1.1
    |       |   |       |     uPatientDetail.php 
    |       |   |       |        |----->uNewPatient.php // for new patient registration
    |       |   |       |        |----->uBookTest.php // for booking test for patient
    |       |   |       |
    |       |   |       |---->card 1.2
    |       |   |       |     uPatientDetail.php
    |       |   |       |        |----->card 1.2.1
    |       |   |       |        |      uAllTest.php
    |       |   |       |        |           |------>Pending
    |       |   |       |        |           |       uUpdateValue.php for updateing the value
    |       |   |       |        |           |------>Complited
    |       |   |       |        |           |       GenReport.php
    |       |   |       |        |           |           |------>GetReport.php
    |       |   |       |        |
    |       |   |       |        |----->card 1.2.2
    |       |   |       |        |      uUpdatePending.php // for update pending test cases
    |       |   |       |        |           |------>Pending
    |       |   |       |        |           |       uUpdateValue.php
    |       |   |       |        |           |------>Edit/Update
    |       |   |       |        |           |       uUpdateValue.php
    |       |   |       |---->card 1.3
    |       |   |       |     uBookTestDB.php //for booking test
    |       |   |       |        |----->uBookTest.php
    |       |   |
    |       |   |--->card 2 //result manage and report generate section
    |       |   |   userTestDashBoard.php
    |       |   |       |---->card 2.1
    |       |   |       |     uPatientResult.php
    |       |   |       |        |----->card 2.1.1
    |       |   |       |        |      uAllTest.php //for showing all tests 
    |       |   |       |        |          |------>Completed
    |       |   |       |        |          |       GenReport.php
    |       |   |       |        |          |            |------->GetReport.php
    |       |   |       |        |          |------>Pending
    |       |   |       |        |          |       uUpdateValue.php
    |       |   |       |        |
    |       |   |       |        |---->card 2.1.2
    |       |   |       |        |     uUpdatePending.php
    |       |   |       |                   |------>Pending
    |       |   |       |                   |       uUpdateValue.php
    |       |   |       |                   |------> Edit/Update
    |       |   |       |                   |       uUpdateValue.php
    |       |   |       |---->card 2.2       
    |       |   |       |     uBookTestDB.php //for booking test   
    |       |   |       |        |----->uBookTest.php       
    |       |   |       
    |       |   |--->card 3 //this is the important section of our project to detect disease
    |       |   |    uDetectDisease.php
    |       |   |       |---->Detect/Predict disease     
    |       |   |       |     uSymptomInp.php // for taking symptoms from user       
    |       |   |       |        |----->uGetDiseaseReport.php // to get the disease report from this system
    |       |
    |       |
    |       |
    |       |-->patientlogin.php // for patient login using the patient id of a registred patient       
    |       |   |--->patient.php       
    |       |   |       |---->card 1
    |       |   |       |     uSymptomInp.php       
    |       |   |       |        |----->uGetDiseaseReport.php
    |       |   |       |---->card 2 
    |       |   |       |      pTestReport.php    
    |       |   |       |        |----->GenReport.php       
    |       |   |       |        |            |------>GetReport.php
