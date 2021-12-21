/*start of the DEFAULT*/
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
(tblprojtargets.q1Ftarget + tblprojtargets.q1Ftarget + tblprojtargets.q1Ftarget + tblprojtargets.q1Ftarget ) 
as Ftotal,

/*start of to date under financial*/
tblprojaccomplishment.q1Releases 
as ReleasesTodate, 

(tblprojaccomplishment.q1Releases / tblprojtargets.q1Ftarget) * 100 
as fundingsupport,

(tblprojaccomplishment.q1ExpAccPayable + tblprojaccomplishment.q1ExpCashDisbursed) 
as actualExpenditure , 

((tblprojaccomplishment.q1ExpAccPayable + tblprojaccomplishment.q1ExpCashDisbursed)/tblprojaccomplishment.q1Releases)* 100 
as  expenditureRate, 

(((tblprojaccomplishment.q1Paccomp/tblprojtargets.q1Ptarget)*100)/(((tblprojaccomplishment.q1ExpAccPayable + tblprojaccomplishment.q1ExpCashDisbursed)/tblprojaccomplishment.q1Releases)* 100))
as FinanciallyCorrelated,

/*end of to date under financial*/

tblprojtargets.q1Ptarget as pq1,
tblprojtargets.q2Ptarget as pq2,
tblprojtargets.q3Ptarget as pq3,
tblprojtargets.q4Ptarget as pq4,
(tblprojtargets.q1Ptarget + tblprojtargets.q1Ptarget + tblprojtargets.q1Ptarget + tblprojtargets.q1Ptarget ) 
as Ptotal,
tblprojtargets.q1Ptarget 
as targettodate,

/* start target to date in percent*/
(tblprojtargets.q1Ptarget/
(tblprojtargets.q1Ptarget + tblprojtargets.q1Ptarget + tblprojtargets.q1Ptarget + tblprojtargets.q1Ptarget ) )*100
as q1TargetPercent,

((tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget)/
(tblprojtargets.q1Ptarget + tblprojtargets.q1Ptarget + tblprojtargets.q1Ptarget + tblprojtargets.q1Ptarget ) )*100
as q2TargetPercent,

((tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget)/
(tblprojtargets.q1Ptarget + tblprojtargets.q1Ptarget + tblprojtargets.q1Ptarget + tblprojtargets.q1Ptarget ) )*100
as q3TargetPercent,

((tblprojtargets.q1Ptarget+tblprojtargets.q2Ptarget+tblprojtargets.q3Ptarget=tblprojtargets.q4Ptarget)/
(tblprojtargets.q1Ptarget + tblprojtargets.q2Ptarget + tblprojtargets.q3Ptarget + tblprojtargets.q4Ptarget ) )*100
as q4TargetPercent,
/*end of target to date in percent*/


tblprojaccomplishment.q1Paccomp
as actualAccomplishment,

/*start of accomplishment to date in percent*/
((tblprojaccomplishment.q1Paccomp/tblprojtargets.q1Ptarget) * 0.25) 
as q1AccomplishmentPercent,

((tblprojaccomplishment.q2Paccomp/tblprojtargets.q2Ptarget) * 0.25)+
((tblprojaccomplishment.q1Paccomp/tblprojtargets.q1Ptarget) * 0.25) 
as q2AccomplishmentPercent,

((tblprojaccomplishment.q3Paccomp/tblprojtargets.q3Ptarget) * 0.25)+
((tblprojaccomplishment.q2Paccomp/tblprojtargets.q2Ptarget) * 0.25)+
((tblprojaccomplishment.q1Paccomp/tblprojtargets.q1Ptarget) * 0.25) 
as q3AccomplishmentPercent,

((tblprojaccomplishment.q4Paccomp/tblprojtargets.q4Ptarget) * 0.25)+
((tblprojaccomplishment.q3Paccomp/tblprojtargets.q3Ptarget) * 0.25)+
((tblprojaccomplishment.q2Paccomp/tblprojtargets.q2Ptarget) * 0.25)+
((tblprojaccomplishment.q1Paccomp/tblprojtargets.q1Ptarget) * 0.25) 
as q4AccomplishmentPercent,
/*end of accomplishment to date in percent*/

(tblprojaccomplishment.q1Paccomp - tblprojtargets.q1Ptarget) 
as slippage , /* todate */

((tblprojaccomplishment.q1Paccomp / tblprojtargets.q1Ptarget) * 100) 
as physicalPerformance /* todate */




FROM
    tblprojects
    INNER JOIN tbllocation 
        ON (tblprojects.locid = tbllocation.locid)
    INNER JOIN tblprojtargets 
        ON (tblprojtargets.projid = tblprojects.projid)
    INNER JOIN tblprojaccomplishment 
        ON (tblprojaccomplishment.projid = tblprojects.projid);

/*end of the DEFAULT*/


























/* default */
select 

/*financial*/
((tblprojaccomplishment.q1Faccomp/tblprojtargets.q1Ftarget) * 0.25) as fq1,

((tblprojaccomplishment.q2Faccomp/tblprojtargets.q2Ftarget) * 0.25)+
((tblprojaccomplishment.q1Faccomp/tblprojtargets.q1Ftarget) * 0.25) as fq2,

((tblprojaccomplishment.q3Faccomp/tblprojtargets.q3Ftarget) * 0.25)+
((tblprojaccomplishment.q2Faccomp/tblprojtargets.q2Ftarget) * 0.25)+
((tblprojaccomplishment.q1Faccomp/tblprojtargets.q1Ftarget) * 0.25) as fq3,

((tblprojaccomplishment.q4Faccomp/tblprojtargets.q4Ftarget) * 0.25)+
((tblprojaccomplishment.q3Faccomp/tblprojtargets.q3Ftarget) * 0.25)+
((tblprojaccomplishment.q2Faccomp/tblprojtargets.q2Ftarget) * 0.25)+
((tblprojaccomplishment.q1Faccomp/tblprojtargets.q1Ftarget) * 0.25) as fq3,

/*physical*/
((tblprojaccomplishment.q1Paccomp/tblprojtargets.q1Ptarget) * 0.25) as pq1,

((tblprojaccomplishment.q2Paccomp/tblprojtargets.q2Ptarget) * 0.25)+
((tblprojaccomplishment.q1Paccomp/tblprojtargets.q1Ptarget) * 0.25) as pq2,

((tblprojaccomplishment.q3Paccomp/tblprojtargets.q3Ptarget) * 0.25)+
((tblprojaccomplishment.q2Paccomp/tblprojtargets.q2Ptarget) * 0.25)+
((tblprojaccomplishment.q1Paccomp/tblprojtargets.q1Ptarget) * 0.25) as pq3,

((tblprojaccomplishment.q4Paccomp/tblprojtargets.q4Ptarget) * 0.25)+
((tblprojaccomplishment.q3Paccomp/tblprojtargets.q3Ptarget) * 0.25)+
((tblprojaccomplishment.q2Paccomp/tblprojtargets.q2Ptarget) * 0.25)+
((tblprojaccomplishment.q1Paccomp/tblprojtargets.q1Ptarget) * 0.25) as pq3,

/*mandays*/
((tblprojaccomplishment.q1Maccomp/tblprojtargets.q1Mtarget) * 0.25) as mq1,

((tblprojaccomplishment.q2Maccomp/tblprojtargets.q2Mtarget) * 0.25)+
((tblprojaccomplishment.q1Maccomp/tblprojtargets.q1Mtarget) * 0.25) as mq2,

((tblprojaccomplishment.q3Maccomp/tblprojtargets.q3Mtarget) * 0.25)+
((tblprojaccomplishment.q2Maccomp/tblprojtargets.q2Mtarget) * 0.25)+
((tblprojaccomplishment.q1Maccomp/tblprojtargets.q1Mtarget) * 0.25) as mq3,

((tblprojaccomplishment.q4Maccomp/tblprojtargets.q4Mtarget) * 0.25)+
((tblprojaccomplishment.q3Maccomp/tblprojtargets.q3Mtarget) * 0.25)+
((tblprojaccomplishment.q2Maccomp/tblprojtargets.q2Mtarget) * 0.25)+
((tblprojaccomplishment.q1Maccomp/tblprojtargets.q1Mtarget) * 0.25) as mq3

from tblprojaccomplishment , tblprojtargets 
where tblprojtargets.projid = 9672
and tblprojaccomplishment.projid = 9672




/* maintained */
select 
((tblprojaccomplishment.q1Faccomp/tblprojtargets.q1Ftarget) * 0.25) as fq1,
((tblprojaccomplishment.q2Faccomp/tblprojtargets.q2Ftarget) * 0.25) as fq2,
((tblprojaccomplishment.q3Faccomp/tblprojtargets.q3Ftarget) * 0.25) as fq3,
((tblprojaccomplishment.q4Faccomp/tblprojtargets.q4Ftarget) * 0.25) as fq4,

((tblprojaccomplishment.q1Paccomp/tblprojtargets.q1Ptarget) * 0.25) as pq1,
((tblprojaccomplishment.q2Paccomp/tblprojtargets.q2Ptarget) * 0.25) as pq2,
((tblprojaccomplishment.q3Paccomp/tblprojtargets.q3Ptarget) * 0.25) as pq3,
((tblprojaccomplishment.q4Paccomp/tblprojtargets.q4Ptarget) * 0.25) as pq4,

((tblprojaccomplishment.q1Maccomp/tblprojtargets.q1Mtarget) * 0.25) as mq1,
((tblprojaccomplishment.q2Maccomp/tblprojtargets.q2Mtarget) * 0.25) as mq2,
((tblprojaccomplishment.q3Maccomp/tblprojtargets.q3Mtarget) * 0.25) as mq3,
((tblprojaccomplishment.q4Maccomp/tblprojtargets.q4Mtarget) * 0.25) as mq4
from tblprojaccomplishment , tblprojtargets 
where tblprojtargets.projid = 9672
and tblprojaccomplishment.projid = 9672



/* commulative */
select 
((tblprojaccomplishment.q1Faccomp/tblprojtargets.q1Ftarget) * 0.25) as fq1,
((tblprojaccomplishment.q2Faccomp/tblprojtargets.q2Ftarget) * 0.50) as fq2,
((tblprojaccomplishment.q3Faccomp/tblprojtargets.q3Ftarget) * 0.75) as fq3,
((tblprojaccomplishment.q4Faccomp/tblprojtargets.q4Ftarget) * 100) as fq4,

((tblprojaccomplishment.q1Paccomp/tblprojtargets.q1Ptarget) * 0.25) as pq1,
((tblprojaccomplishment.q2Paccomp/tblprojtargets.q2Ptarget) * 0.50) as pq2,
((tblprojaccomplishment.q3Paccomp/tblprojtargets.q3Ptarget) * 0.75) as pq3,
((tblprojaccomplishment.q4Paccomp/tblprojtargets.q4Ptarget) * 100) as pq4,

((tblprojaccomplishment.q1Maccomp/tblprojtargets.q1Mtarget) * 0.25) as mq1,
((tblprojaccomplishment.q2Maccomp/tblprojtargets.q2Mtarget) * 0.50) as mq2,
((tblprojaccomplishment.q3Maccomp/tblprojtargets.q3Mtarget) * 0.75) as mq3,
((tblprojaccomplishment.q4Maccomp/tblprojtargets.q4Mtarget) * 100) as mq4
from tblprojaccomplishment , tblprojtargets 
where tblprojtargets.projid = 9672
and tblprojaccomplishment.projid = 9672



select 
q1Faccomp,
q2Faccomp,
q3Faccomp,
q4Faccomp
from tblprojaccomplishment


