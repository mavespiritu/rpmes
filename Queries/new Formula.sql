SELECT tblprojects.projname
,tblprojects.unitofmeasure
,tblfundsrc.funddesc
,tblprojects.datestart
,tblprojects.dateend

,(tblprojtargets.q1Ftarget
+tblprojtargets.q2Ftarget
+tblprojtargets.q3Ftarget
+tblprojtargets.q4Ftarget) as allocation /* D.C.M. will apply*/

,tblprojaccomplishment.q1Obligations as obligation/*depends the quarter*/

,tblprojaccomplishment.q1Releases as releases /*depends the quarter*/

,tblprojaccomplishment.q1Expenditure as  expenditure/*depends the quarter*/

,(tblprojaccomplishment.q1Releases/tblprojtargets.q1Ftarget)*100 as fundsupport /* D.C.M. will apply*/

,(tblprojaccomplishment.q1Expenditure/tblprojaccomplishment.q1Releases)*100 fundutilizition /* D.C.M. will apply*/

,(tblprojtargets.q1Ptarget) as targetTodate /* D.C.M. will apply*/

,(tblprojaccomplishment.q1Paccomp) as actualTodate  /* D.C.M. will apply*/

,(tblprojaccomplishment.q1Paccomp - tblprojtargets.q1Ptarget)*100 as sllipage /*depends on quarter*/

,(tblprojaccomplishment.q1Paccomp/tblprojtargets.q1Ptarget)*100 as performance /* D.C.M. will apply*/

,(tblprojaccomplishment.q1Maccomp/tblprojtargets.q1Mtarget) as employmentGenerated 

FROM tblprojects

INNER JOIN tblprojtargets 
ON (tblprojtargets.projid = tblprojects.projid)
INNER JOIN tblprojaccomplishment 
ON (tblprojaccomplishment.projid = tblprojects.projid)

INNER JOIN tblfundsrc 
ON (tblfundsrc.fundid = tblprojects.fundid)

