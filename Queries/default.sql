
    
SELECT
tblprojects.projname ,

tbllocation.provincename,

tbllocation.district,

tbllocation.city,

tblprojects.unitofmeasure,

tblprojtargets.q1Ftarget as fq1,

tblprojtargets.q2Ftarget as fq2,

tblprojtargets.q3Ftarget as fq3,

tblprojtargets.q4Ftarget as fq4,

(tblprojtargets.q1Ftarget +
tblprojtargets.q1Ftarget + 
tblprojtargets.q1Ftarget + 
tblprojtargets.q1Ftarget ) 
as Ftotal,

tblprojaccomplishment.q1Releases
as ReleasesTodate, 

( tblprojaccomplishment.q1Releases /
   tblprojtargets.q1Ftarget) * 100 
as fundingsupport,

(tblprojaccomplishment.q1ExpAccPayable + 
 tblprojaccomplishment.q1ExpCashDisbursed) 
as actualExpenditure , 

((tblprojaccomplishment.q1ExpAccPayable+ 
 tblprojaccomplishment.q1ExpCashDisbursed)
     /tblprojaccomplishment.q1Releases )* 100 
as  expenditureRate, 

(
((tblprojaccomplishment.q1Paccomp/tblprojtargets.q1Ptarget)*100)/
 (((tblprojaccomplishment.q1ExpAccPayable+
    tblprojaccomplishment.q1ExpCashDisbursed)/
    tblprojaccomplishment.q1Releases)* 100))
as FinanciallyCorrelated,

tblprojtargets.q1Ptarget as pq1,

tblprojtargets.q2Ptarget as pq2,

tblprojtargets.q3Ptarget as pq3,

tblprojtargets.q4Ptarget as pq4,

(tblprojtargets.q1Ptarget + 
tblprojtargets.q1Ptarget + 
tblprojtargets.q1Ptarget + 
tblprojtargets.q1Ptarget ) 
as Ptotal,

tblprojtargets.q1Ptarget
as targettodate,

(tblprojtargets.q1Ptarget/
(tblprojtargets.q1Ptarget + 
tblprojtargets.q2Ptarget + 
tblprojtargets.q3Ptarget +
tblprojtargets.q4Ptarget ) )*100
as q1TargetPercent,

((tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget)/
(tblprojtargets.q1Ptarget +
tblprojtargets.q2Ptarget + 
tblprojtargets.q3Ptarget + 
tblprojtargets.q4Ptarget ) )*100
as q2TargetPercent,

((tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget)/
(tblprojtargets.q1Ptarget +
 tblprojtargets.q2Ptarget +
 tblprojtargets.q3Ptarget +
 tblprojtargets.q4Ptarget ) )*100
as q3TargetPercent,

((tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget+tblprojtargets.q4Ptarget)/
(tblprojtargets.q1Ptarget +
 tblprojtargets.q2Ptarget +
 tblprojtargets.q3Ptarget +
 tblprojtargets.q4Ptarget ) )*100
as q4TargetPercent,



tblprojaccomplishment.q1Releases
as actualAccomplishment,


((tblprojaccomplishment.q1Paccomp/tblprojtargets.q1Ptarget) * 100) 
as q1AccomplishmentPercent,

((tblprojaccomplishment.q2Paccomp/(tblprojtargets.q2Ptarget 
                                    +tblprojtargets.q1Ptarget)) * 100) 
as q2AccomplishmentPercent,

((tblprojaccomplishment.q3Paccomp/(tblprojtargets.q3Ptarget
                                    +tblprojtargets.q2Ptarget
                                        +tblprojtargets.q1Ptarget)) * 100) 
as q3AccomplishmentPercent,

((tblprojaccomplishment.q4Paccomp/(tblprojtargets.q4Ptarget
                                       +tblprojtargets.q3Ptarget
                                            +tblprojtargets.q2Ptarget
                                                +tblprojtargets.q1Ptarget)) * 100) 
as q4AccomplishmentPercent,


(tblprojaccomplishment.q1Paccomp - tblprojtargets.q1Ptarget) 
as slippage , 

((tblprojaccomplishment.q1Paccomp / tblprojtargets.q1Ptarget) * 100) 
as physicalPerformance 

FROM
    tblprojects
    INNER JOIN tbllocation 
        ON (tblprojects.locid = tbllocation.locid)
    INNER JOIN tblprojtargets 
        ON (tblprojtargets.projid = tblprojects.projid)
    INNER JOIN tblprojaccomplishment 
        ON (tblprojaccomplishment.projid = tblprojects.projid)
where tblprojects.projid = 3520
      