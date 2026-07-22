<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau message de contact</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f5f5f5; margin: 0; padding: 20px;">
    <div style="max-width: 600px; margin: 0 auto; background-color: white; border-radius: 8px; padding: 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
        <h2 style="color: #1B4D3E; margin-top: 0;">Nouveau message de contact</h2>
        <p style="color: #666; margin-bottom: 20px;">Vous avez reçu un nouveau message depuis le formulaire de contact de votre site web.</p>
        
        <div style="background-color: #f8f9fa; padding: 20px; border-radius: 5px; margin-bottom: 20px;">
            <p style="margin: 0 0 10px 0;"><strong>Nom :</strong> {{ $name }}</p>
            <p style="margin: 0 0 10px 0;"><strong>Email :</strong> {{ $email }}</p>
            <p style="margin: 0 0 10px 0;"><strong>Sujet :</strong> {{ $subject }}</p>
        </div>
        
        <div style="background-color: #f8f9fa; padding: 20px; border-radius: 5px; margin-bottom: 20px;">
            <h4 style="margin-top: 0; color: #1B4D3E;">Message :</h4>
            <p style="white-space: pre-wrap; margin: 0;">{{ $contact_message }}</p>
        </div>
        
        <hr style="border: none; border-top: 1px solid #eee; margin: 20px 0;">
        <p style="color: #999; font-size: 12px; margin: 0;">Ce message a été envoyé depuis {{ $settings['site_name'] ?? 'Fondation Halya' }}</p>
    </div>
</body>
</html>