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






SELECT
    tblprojsector.secid
,
tblagency.agencyid
    , tblprojsector.secname

FROM
    tblprojects
    INNER JOIN tblagency 
        ON (tblprojects.agencyid = tblagency.agencyid)
    INNER JOIN tblprojsector 
        ON (tblprojects.secid = tblprojsector.secid)
where tblagency.agencyid = 1
GROUP BY tblprojsector.secid





