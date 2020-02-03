SELECT
	T.customers_id,
    T.firstName,
    T.lastName,
    T.dateOfBirth,
    T.phoneNumber,
    T.email,
    T.passWord,
    T.addressLine1,
    T.addressLine2,
    T.compunyName,
    T.cityName,
    T.state,
    T.country,
    T.postalCode,
    MIN(T.discriptionAboutSelf) AS discriptionAboutSelf,
    MIN(T.uploadImage) AS uploadImage,
    MIN(T.uploadCertificate) AS uploadCertificate,
    MIN(T.howLongInBusiness) AS howLongInBusiness,
    MIN(T.numberOfClients) AS numberOfClients,
    MIN(T.getInTouch) AS getInTouch,
    MIN(T.Hobbies) AS Hobbies
FROM (
    SELECT
	A.customers_id,
    A.firstName,
    A.lastName,
    A.dateOfBirth,
    A.phoneNumber,
    A.email,
    A.passWord,
    B.addressLine1,
    B.addressLine2,
    B.compunyName,
    B.cityName,
    B.state,
    B.country,
    B.postalCode,
    (
        CASE WHEN fieldKey = "discriptionAboutSelf" THEN CA.value
    END
) discriptionAboutSelf,
(
    CASE WHEN fieldKey = "uploadImage" THEN CA.value
END
) uploadImage,
(
    CASE WHEN fieldKey = "uploadCertificate" THEN CA.value
END
) uploadCertificate,
(
    CASE WHEN fieldKey = "howLongInBusiness" THEN CA.value
END
) howLongInBusiness,
(
    CASE WHEN fieldKey = "numberOfClients" THEN CA.value
END
) numberOfClients,
(
    CASE WHEN fieldKey = "getInTouch" THEN CA.value
END
) getInTouch,
(
    CASE WHEN fieldKey = "Hobbies" THEN CA.value
END
) Hobbies
FROM
    customers A
    
INNER JOIN
customer_address B
ON A.customers_id = B.customers_id
INNER JOIN customer_additional_info CA ON
    A.customers_id = CA.customers_id
) AS T
GROUP BY T.customers_id