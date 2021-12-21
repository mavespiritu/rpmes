SELECT 
projid,
implementingAgency,
location,
nameOfProject,
q1actionRecommendation as actionRecommendation,
q1dateOfProjectInspection as dateOfProjectInspection,
q1issues as issues,
q1physicalStatus as physicalStatus  
FROM tblform7 WHERE projid = 8717