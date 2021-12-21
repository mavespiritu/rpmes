select agencyid from tblprojaccomplishment where projid =  21512 group by agencyid
select count(agency) as number from acknowledgement where
 acknowledgement.agency = 1 and acknowledgement.quarter = 4 and acknowledgement.year =  2016
select count(agency) from acknowledgement where agency =1

select agencyid from tblprojects where projid =  41121