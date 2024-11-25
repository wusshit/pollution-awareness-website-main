<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address.";
        exit;
    }

    // Azure Blob Storage configuration
    $accountName = "messagewoyaoa"; // Replace with your Azure Storage Account name
    $containerName = "messages"; // The container you created in Azure
    $blobName = "messages.txt";

    // Shared Access Signature (SAS) token - do not include the initial '?'
    $sasToken = "sp=racwdli&st=2024-11-25T17:43:18Z&se=2025-11-26T01:44:18Z&spr=https&sv=2022-11-02&sr=c&sig=CQvAc%2BAu5cHZ0YNRMdPHhXMBM70tfPJ6p2CPTP8hHLY%3D";

    // Construct the Blob URL
    $blobUrl = "https://$accountName.blob.core.windows.net/$containerName/$blobName?$sasToken";

    // Prepare the new message to be appended
    $newMessage = "Name: $name\nEmail: $email\nMessage: $message\n------------------------\n";

    // Step 1: Fetch the existing content
    $ch = curl_init($blobUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Content-Type: text/plain"
    ]);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

    $existingContent = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($httpCode == 404) {
        // Blob doesn't exist, so we create it with the new message
        $existingContent = "";
    } elseif (curl_errno($ch)) {
        echo "Error: " . curl_error($ch);
        curl_close($ch);
        exit;
    }

    curl_close($ch);

    // Step 2: Append the new message to the existing content
    $updatedContent = $existingContent . $newMessage;

    // Step 3: Write the updated content back to the blob
    $ch = curl_init($blobUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "x-ms-blob-type: BlockBlob",
        "Content-Type: text/plain"
    ]);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $updatedContent);

    $result = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if (curl_errno($ch)) {
        echo "Error: " . curl_error($ch);
    } else if ($httpCode == 201) {
        echo "Message saved successfully.";
    } else {
        echo "Error: Failed to PUT new content. HTTP Status Code: $httpCode";
        echo "<br>Error Details: " . curl_error($ch);
    }

    curl_close($ch);
}
?>
