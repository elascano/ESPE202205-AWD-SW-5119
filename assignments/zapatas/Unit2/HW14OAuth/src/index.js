const express= require('express');
const path= require('path');
const nodemailer= require('nodemailer');
const {google}= require('googleapis');
const app = express();

const port = 3000;

app.use(express.urlencoded({extended: false}));
app.use(express.json()); 
app.use(express.static(path.join(__dirname, 'public')));

app.post('/send-email',function(req, res){
    const {name, email,phone, message} = req.body;
    const CLIENT_ID="NoSuboinfo a git";
    const CLIENT_SECRET="NoSuboinfo a git";
    const REDIRECT_URI="https://developers.google.com/oauthplayground";
    const REFRESH_TOKEN="NoSuboinfo a git";
    const contentHtml= `
    <h1>Formulario de nodemailer</h1>
    <ul> 
        <li>name: ${name}</li>
        <li>email: ${email}</li>
        <li>phone: ${phone}</li>
        
    </ul>
    <p>${message}</p>
    `;
    res.send('User: ' + name +" authorized by OAuth2  email send to: sazapata2@espe.edu.ec");
   
   
    const oAuth2Client= new google.auth.OAuth2(CLIENT_ID,CLIENT_SECRET,REDIRECT_URI)

    oAuth2Client.setCredentials({refresh_token:REFRESH_TOKEN});

    async function sendEmail(){
        try{
            const access_token = await  oAuth2Client.getAccessToken();
            const transporte= nodemailer.createTransport({
                service: 'gmail',
                auth: {
                    type: "OAuth2",
                    user: "sazapata2@espe.edu.ec",
                    clientId: CLIENT_ID,
                    clientSecret: CLIENT_SECRET,
                    refreshToken: REFRESH_TOKEN,
                    accessToken: access_token
                }


            });
            const mailOptions = {
                form: "Pagina de OAuth <sazapata2@espe.edu.ec>",
                to: "sazapata2@espe.edu.ec",
                subject: "Correo desde Aplicacion",
                html: contentHtml,
            };
            const result = await transporte.sendMail(mailOptions);
            return result;
        }catch(error){
            console.log(error);
        }
        
    }
    sendEmail()
        .then(result=>res.status(200).send(''))
        .catch((error)=>console.log(error.message));
});

app.listen(port, function() {
    console.log('listening on port ' + port);
});