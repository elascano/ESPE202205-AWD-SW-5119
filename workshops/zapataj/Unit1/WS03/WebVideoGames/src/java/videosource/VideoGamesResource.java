/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package videosource;

import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Produces;
import javax.ws.rs.Consumes;
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.core.MediaType;

/**
 * REST Web Service
 *
 * @author HP
 */
@Path("videoGames")
public class VideoGamesResource {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of VideoGamesResource
     */
    public VideoGamesResource() {
    }

    /**
     * Retrieves representation of an instance of videosource.VideoGamesResource
     * @return an instance of java.lang.String
     */
    @GET
    @Produces(MediaType.TEXT_PLAIN)
    public String getText() {
         String videogames=" [\n" +
"{\n" +
"\n" +
"\"idGame\":1,\n" +
"\"name\":\"MarioBros\",\n" +
"\"type\":\"Adventure\",\n" +
"\"console\":\"Nintendo64\",\n" +
"},\n" +
"{\n" +
"\n" +
"   \"idGame\":2,\n" +
"  \" name\":\"World of Warcraft\",\n" +
"\"type\":\"MMORPG\",\n" +
"\"console\": \"PC\",\n" +
"},\n" +
"{\n" +
"\n" +
"   \"idGame\":3,\n" +
"  \" name\":\"Call of Duty\",\n" +
"\"type\":\"Shooter\",\n" +
"\"console\": \"PC\",\n" +
"},\n" +
"{\n" +
"\n" +
"   \"idGame\":4,\n" +
"  \" name\":\"Halo\",\n" +
"\"type\":\"Shooter\",\n" +
"\"console\": \"XboX\",\n" +
"},\n" +
"]";
       return videogames;
    }

    /**
     * PUT method for updating or creating an instance of VideoGamesResource
     * @param content representation for the resource
     */
    @PUT
    @Consumes(MediaType.TEXT_PLAIN)
    public void putText(String content) {
    }
}
