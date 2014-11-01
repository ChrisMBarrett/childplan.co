SELECT 
		EnquiryID									AS EnquiryID
	,	EnquirerName								AS ContactName
	,	EnquiryPhoneNumber							AS ContactPhone
	,	DATE_FORMAT(EnquiryDate,'%W, %D %M \'%y') 	AS EnquiryDate
	,	FirstChildsName								AS FirstChildsName
    ,	FirstChildsDOB								AS FirstChildsDOB
    ,	'No'										AS TourBooked
    ,	CONCAT_WS
            ( ', '
            , CASE WHEN years = 0 THEN NULL ELSE CONCAT(years,' years') END
            ,  CONCAT(months, ' months')
            ) AS ChildsAge
  	,	WithinLast24hrs								AS WithinLast24hrs
  	FROM
     ( SELECT 
            	a.EnquiryID
            ,	b.EnquirerName
            ,	b.EnquiryPhoneNumber
            ,	b.EnquiryDate
            ,	a.FirstChildsName
            , 	FirstChildsDOB
            , 	IF (Curdate() > FirstChildsDOB,
            		FLOOR(DATEDIFF(CURDATE(),a.FirstChildsDOB)/365) ,	
            		'') AS Years
            ,	IF (Curdate() > FirstChildsDOB,
            		FLOOR((DATEDIFF(CURDATE(),a.FirstChildsDOB)/365 - FLOOR(DATEDIFF(CURDATE(),a.FirstChildsDOB)/365))* 12) ,	
            		MONTH(CURDATE())-month(a.FirstChildsDOB) ) 		AS Months
            ,	IF (a.DateTimeAdded < CURDATE(),'New','Old')		AS WithinLast24hrs
            		
         FROM 
         	tblenquiryhistory a
         LEFT JOIN
         	tblEnquiry b
         ON
         	a.EnquiryID = b.EnquiryID
         WHERE
         	a.CentreID = 1
         AND
         	b.EnquiryStatusID = 1
         ORDER BY
		 	EnquiryAddedDateTime DESC			
     ) x