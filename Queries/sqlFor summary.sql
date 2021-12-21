
SELECT 
(SELECT count(q1Ptarget) from tblprojtargets where q1Ptarget >0) as q1PN,
(SELECT count(q2Ptarget) from tblprojtargets where q2Ptarget >0) as q2PN,
(SELECT count(q3Ptarget) from tblprojtargets where q3Ptarget >0) as q3PN,
(SELECT count(q4Ptarget) from tblprojtargets where q4Ptarget >0) as q4PN,

SUM(q1Ptarget) as q1P,
SUM(q2Ptarget) as q2P,
SUM(q3Ptarget) as q3P,
SUM(q4Ptarget) as q4P,

SUM(q1Ftarget) as q1F,
SUM(q2Ftarget) as q2F,
SUM(q3Ftarget) as q3F,
SUM(q4Ftarget) as q4F,

SUM(q1Mtarget) as q1M,
SUM(q2Mtarget) as q2M,
SUM(q3Mtarget) as q3M,
SUM(q4Mtarget) as q4M,

tblprojsector.secname



FROM tblprojtargets
INNER JOIN tblprojects 
        ON (tblprojtargets.projid = tblprojects.projid) 
INNER JOIN tblagency 
        ON (tblprojects.agencyid = tblagency.agencyid)
INNER JOIN tblprojcategory 
        ON (tblprojects.catid = tblprojcategory.catid)
INNER JOIN tblprojsector
        ON (tblprojects.secid = tblprojsector.secid)



GROUP by tblprojects.projid


/************************/

SELECT 
SUM(q1Ftarget) as q1F,
SUM(q2Ftarget) as q2F,
SUM(q3Ftarget) as q3F,
SUM(q4Ftarget) as q4F,
(SELECT count(q1Ptarget) from tblprojtargets where q1Ptarget >0) as q1PN,
(SELECT count(q2Ptarget) from tblprojtargets where q2Ptarget >0) as q2PN,
(SELECT count(q3Ptarget) from tblprojtargets where q3Ptarget >0) as q3PN,
(SELECT count(q4Ptarget) from tblprojtargets where q4Ptarget >0) as q4PN,
SUM(q1Mtarget) as q1M,
SUM(q2Mtarget) as q2M,
SUM(q3Mtarget) as q3M,
SUM(q4Mtarget) as q4M,
SUM(q1Ptarget) as q1P,
SUM(q2Ptarget) as q2P,
SUM(q3Ptarget) as q3P,
SUM(q4Ptarget) as q4P,
tblprojects.agencyid,
tblprojects.catid,
tblprojects.period,
tblprojcategory.catname,
tblprojsector.secname


FROM tblprojtargets
INNER JOIN tblprojects 
        ON (tblprojtargets.projid = tblprojects.projid) 
INNER JOIN tblagency 
        ON (tblprojects.agencyid = tblagency.agencyid)
INNER JOIN tblprojcategory 
        ON (tblprojects.catid = tblprojcategory.catid)
INNER JOIN tblprojsector
        ON (tblprojects.secid = tblprojsector.secid)
 where tblprojects.period = 2 and tblprojects.secid = 1
group by tblprojects.projid


/**************************/

SELECT 
SUM(q1Ftarget) as q1F,
SUM(q2Ftarget) as q2F,
SUM(q3Ftarget) as q3F,
SUM(q4Ftarget) as q4F,

(SELECT count(q1Ptarget) from tblprojtargets where q1Ptarget >0) as q1PN,
(SELECT count(q2Ptarget) from tblprojtargets where q2Ptarget >0) as q2PN,
(SELECT count(q3Ptarget) from tblprojtargets where q3Ptarget >0) as q3PN,
(SELECT count(q4Ptarget) from tblprojtargets where q4Ptarget >0) as q4PN,




SUM(q1Mtarget) as q1M,
SUM(q2Mtarget) as q2M,
SUM(q3Mtarget) as q3M,
SUM(q4Mtarget) as q4M,

SUM(q1Ptarget) as q1P,
SUM(q2Ptarget) as q2P,
SUM(q3Ptarget) as q3P,
SUM(q4Ptarget) as q4P,
tblprojsector.secname as pname

FROM tblprojtargets
INNER JOIN tblprojects 
        ON (tblprojtargets.projid = tblprojects.projid) 
INNER JOIN tblagency 
        ON (tblprojects.agencyid = tblagency.agencyid)
INNER JOIN tblprojcategory 
        ON (tblprojects.catid = tblprojcategory.catid)
INNER JOIN tblprojsector
        ON (tblprojects.secid = tblprojsector.secid)
GROUP BY tblprojects.projid 
ORDER BY tblprojsector.secname ASC

/*************************/


SELECT 
SUM(q1Ftarget) as q1F,
SUM(q2Ftarget) as q2F,
SUM(q3Ftarget) as q3F,
SUM(q4Ftarget) as q4F,

(SELECT count(q1Ptarget) from tblprojtargets where q1Ptarget >0) as q1PN,
(SELECT count(q2Ptarget) from tblprojtargets where q2Ptarget >0) as q2PN,
(SELECT count(q3Ptarget) from tblprojtargets where q3Ptarget >0) as q3PN,
(SELECT count(q4Ptarget) from tblprojtargets where q4Ptarget >0) as q4PN,




SUM(q1Mtarget) as q1M,
SUM(q2Mtarget) as q2M,
SUM(q3Mtarget) as q3M,
SUM(q4Mtarget) as q4M,

SUM(q1Ptarget) as q1P,
SUM(q2Ptarget) as q2P,
SUM(q3Ptarget) as q3P,
SUM(q4Ptarget) as q4P,
tblagency.agencycode as pname,
tblprojects.secid



FROM tblprojtargets
INNER JOIN tblprojects 
        ON (tblprojtargets.projid = tblprojects.projid) 
INNER JOIN tblagency 
        ON (tblprojects.agencyid = tblagency.agencyid)
INNER JOIN tblprojcategory 
        ON (tblprojects.catid = tblprojcategory.catid)
INNER JOIN tblprojsector
        ON (tblprojects.secid = tblprojsector.secid)

        where tblprojects.catid=2
        and
        tblprojects.secid = 2
GROUP BY tblprojects.projid
ORDER BY tblagency.agencycode ASC


/**************/
SELECT 
SUM(q1Ftarget) as q1F,
SUM(q2Ftarget) as q2F,
SUM(q3Ftarget) as q3F,
SUM(q4Ftarget) as q4F,

(SELECT count(q1Ptarget) from tblprojtargets where q1Ptarget >0) as q1PN,
(SELECT count(q2Ptarget) from tblprojtargets where q2Ptarget >0) as q2PN,
(SELECT count(q3Ptarget) from tblprojtargets where q3Ptarget >0) as q3PN,
(SELECT count(q4Ptarget) from tblprojtargets where q4Ptarget >0) as q4PN,




SUM(q1Mtarget) as q1M,
SUM(q2Mtarget) as q2M,
SUM(q3Mtarget) as q3M,
SUM(q4Mtarget) as q4M,

SUM(q1Ptarget) as q1P,
SUM(q2Ptarget) as q2P,
SUM(q3Ptarget) as q3P,
SUM(q4Ptarget) as q4P,
tblagency.agencycode as pname,
tblprojects.secid



FROM tblprojtargets
INNER JOIN tblprojects 
        ON (tblprojtargets.projid = tblprojects.projid) 
INNER JOIN tblagency 
        ON (tblprojects.agencyid = tblagency.agencyid)
INNER JOIN tblprojcategory 
        ON (tblprojects.catid = tblprojcategory.catid)
INNER JOIN tblprojsector
        ON (tblprojects.secid = tblprojsector.secid)
      where
       
        tblprojects.secid = 13409
GROUP BY tblprojects.projid
ORDER BY tblagency.agencycode ASC

 /*****/
SELECT 

q1Ptarget ,
q2Ptarget ,
q3Ptarget ,
q4Ptarget ,
tblagency.agencycode as pname,
tblprojects.secid



FROM tblprojtargets
INNER JOIN tblprojects 
        ON (tblprojtargets.projid = tblprojects.projid) 
INNER JOIN tblagency 
        ON (tblprojects.agencyid = tblagency.agencyid)
INNER JOIN tblprojcategory 
        ON (tblprojects.catid = tblprojcategory.catid)
INNER JOIN tblprojsector
        ON (tblprojects.secid = tblprojsector.secid)
ORDER BY tblagency.agencycode ASC


/************************/
SELECT 
if(q1Ptarget>0,Count(q1Ptarget),0) as q1,
if(q2Ptarget>0,Count(q2Ptarget),0) as q2,
if(q3Ptarget>0,Count(q3Ptarget),0) as q3,
if(q4Ptarget>0,Count(q4Ptarget),0) as q4,
tblprojects.agencyid,
tblagency.agencycode



FROM tblprojtargets
INNER JOIN tblprojects 
        ON (tblprojtargets.projid = tblprojects.projid) 
INNER JOIN tblagency 
        ON (tblprojects.agencyid = tblagency.agencyid)
INNER JOIN tblprojcategory 
        ON (tblprojects.catid = tblprojcategory.catid)
INNER JOIN tblprojsector
        ON (tblprojects.secid = tblprojsector.secid)
where tblprojects.secid = 13409
GROUP by tblprojects.secid
ORDER BY tblagency.agencycode ASC



SELECT 

if(q1Ptarget>0,count(q1Ptarget),0) as q1,
if(q2Ptarget>0,count(q2Ptarget),0) as q2,
if(q3Ptarget>0,count(q3Ptarget),0) as q3,
if(q4Ptarget>0,count(q4Ptarget),0) as q4
 
from tblprojtargets
INNER JOIN tblprojects
ON(tblprojects.projid = tblprojtargets.projid)
INNER JOIN tblagency 
ON(tblprojects.agencyid =tblagency.agencyid)
group by tblagency.agencycode

