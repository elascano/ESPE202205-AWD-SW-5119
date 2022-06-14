/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package video_games;

import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Consumes;
import javax.ws.rs.Produces;
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.core.MediaType;

/**
 * REST Web Service
 *
 * @author A l e x a n d e r
 */
@Path("games")
public class GamesResource {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of GamesResource
     */
    public GamesResource() {
    }

    /**
     * Retrieves representation of an instance of video_games.GamesResource
     * @return an instance of java.lang.String
     */
    @GET
    @Produces(MediaType.TEXT_PLAIN)
    public String getText() {
        String game = "[{\"name\":\"Fortnite\",\"platforms\":\"Windows\",\"developer\":\"Epic-Games\",\"genders\":\"Battle-royale\",\"dealers\":Epic-Games}"
                  +",{\"name\":\"Elden Ring\",\"platforms\":\"PlayStation 4\",\"developer\":\"FromSoftware\",\"genders\":\"Adventures\",\"dealers\":Bandai Namco Entertainment}"
                  +",{\"name\":\"League of Legends\",\"platforms\":\"Windows\",\"developer\":\"Riot Games\",\"genders\":\"MOBA\",\"dealers\":None}"
                  +",{\"name\":\"Tekken 3\",\"platforms\":\"Console\",\"developer\":\"Katsuhiro Harada\",\"genders\":\"Multiplayer\",\"dealers\":Sony Interactive Entertainment Europe}"
                  +",{\"name\":\"FIFA\",\"platforms\":\"PlayStation 4\",\"developer\":\"EA Canada\",\"genders\":\"Futbol\",\"dealers\":Electronic Arts}"
                  +",{\"name\":\"Resident Evil 7: Biohazard\",\"platforms\":\"PlayStation 4\",\"developer\":\"Capcom\",\"genders\":\"Survivor\",\"dealers\":Capcom}"
                  +",{\"name\":\"Call of Duty: Warzone\",\"platforms\":\"Project Scarlett\",\"developer\":\"Raven Software\",\"genders\":\"Shooter\",\"dealers\":Activision}"
                  +"]";
        return game;
    }

    /**
     * PUT method for updating or creating an instance of GamesResource
     * @param content representation for the resource
     */
    @PUT
    @Consumes(MediaType.TEXT_PLAIN)
    public void putText(String content) {
    }
}
