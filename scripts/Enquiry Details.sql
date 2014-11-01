SELECT
							EnquiryID																				AS EnquiryID
	 					,	EnquirerName																			AS EnquirerName
	 					,	EnquiryPhoneNumber																		AS ContactPhone
	 					,	EnquiryEmailAddress																		AS ContactEmail
	 					,	FirstChildsName																			AS FirstChildsName
	 					,	DATE_FORMAT(FirstChildsDOB,'%W, %D %M \'%y')											AS FirstChildsDOB
	 					,	FirstChildsDOB																			AS FirstChildsDOB
	 					,	CONCAT_WS
            				( ', '
            				, CASE WHEN years = 0 THEN NULL ELSE CONCAT(years,' years') END
            				, CASE WHEN months = 0 THEN NULL ELSE CONCAT(months, ' months') END
            				) 																						AS FirstChildsAge
	 					,	FirstChildsGenderID																		AS FirstChildsGenderID
	 					,	GenderDesc																				AS FirstChildsGender
	 					,	concat(FirstChildsDOWRequested,' (',FirstChildsNumberofDaysRequested, ' Days)')			AS FirstChildsDOW
	 					,	DATE_FORMAT(FirstChildsRequestedStartDate,'%W, %D %M \'%y')								AS FirstChildsIdealStartDate
	 					,	DATE_FORMAT(EnquiryDate,'%W, %D %M \'%y')												AS EnquiryDate
	 					,	EnquiryNotes																			AS EnquiryNotes
	 					,	EnquirySourceID																			AS EnquirySourceID
	 					,	EnquirySourceDesc																		AS EnquirySource
	 					,	EnquiryStatusID																			AS EnquiryStatusID
	 					,	EnquiryStatusDesc																		AS EnquiryStatus
	 					,	EnquiryAddedByUserID																	AS EnquiryAddedByUserID
	 					,	EnquiryAddedByUserName																	AS EnquiryAddedByUserName
	 					,	EnquiryAddedDateTime																	AS EnquiryUpdateDateTime
	 				FROM
	 					(SELECT
	 						a.EnquiryID																				AS EnquiryID
	 					,	a.EnquirerName																			AS EnquirerName
	 					,	a.EnquiryPhoneNumber																	AS EnquiryPhoneNumber
	 					,	a.EnquiryEmailAddress																	AS EnquiryEmailAddress
	 					,	b.FirstChildsName																		AS FirstChildsName
	 					,	DATE_FORMAT(b.FirstChildsDOB,'%W, %D %M \'%y')											AS FirstChildsDOB
	 					,	b.FirstChildsDOB																		AS FirstChildsAge
	 					,	b.FirstChildsGenderID																	AS FirstChildsGenderID
	 					,	e.GenderDesc																			AS GenderDesc
	 					,	b.FirstChildsDOWRequested																AS FirstChildsDOWRequested
	 					,	b.FirstChildsNumberofDaysRequested														AS FirstChildsNumberofDaysRequested
	 					,	FirstChildsRequestedStartDate															AS FirstChildsRequestedStartDate
	 					,	DATE_FORMAT(EnquiryDate,'%W, %D %M \'%y')												AS EnquiryDate
	 					,	b.EnquiryNotes																			AS EnquiryNotes
	 					,	a.EnquirySourceID																		AS EnquirySourceID
	 					,	c.EnquirySourceDesc																		AS EnquirySourceDesc
	 					,	a.EnquiryStatusID																		AS EnquiryStatusID
	 					,	d.EnquiryStatusDesc																		AS EnquiryStatusDesc
	 					,	b.AddedByUserID																			AS EnquiryAddedByUserID
	 					,	CONCAT(f.UserFName,' ',f.UserLName)														AS EnquiryAddedByUserName
	 					,	b.DateTimeAdded																			AS EnquiryAddedDateTime
	 					,	IF (Curdate() > FirstChildsDOB,
	 							FLOOR(DATEDIFF(CURDATE(),b.FirstChildsDOB)/365) ,	
	 							'') AS Years
	 					,	IF (Curdate() > FirstChildsDOB,
	 							FLOOR((DATEDIFF(CURDATE(),b.FirstChildsDOB)/365 - FLOOR(DATEDIFF(CURDATE(),b.FirstChildsDOB)/365))* 12) ,	
	 							MONTH(CURDATE())-month(b.FirstChildsDOB) ) AS Months				
	 				FROM	
	 					tblEnquiry a
	 				LEFT JOIN
	 					tblEnquiryHistory b
	 				ON
	 					a.EnquiryID = b.EnquiryID
	 				LEFT JOIN
	 					tblEnquirySource c	
	 				ON
	 					a.EnquirySourceID = c.EnquirySourceID
	 				LEFT JOIN
	 					tblEnquiryStatus d
	 				ON
	 					a.EnquiryStatusID = d.EnquiryStatusID
	 				LEFT JOIN
	 					tblGender e
	 				ON
	 					b.FirstChildsGenderID = e.GenderID
	 				LEFT JOIN
	 					tblUser f
	 				ON
	 					b.AddedByUserID = f.UserID			
	 				WHERE
	 					a.CentreID = 1
	 				AND
	 					a.EnquiryID = 157) x