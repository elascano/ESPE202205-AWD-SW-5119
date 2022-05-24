/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package musicapp;

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
 * @author HP
 */
@Path("music")
public class MusicResource {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of MusicResource
     */
    public MusicResource() {
    }

    /**
     * Retrieves representation of an instance of musicapp.MusicResource
     * @return an instance of java.lang.String
     */
    @GET
    @Produces(MediaType.TEXT_PLAIN)
    public String getText() {
       String song = 
             "[{\"author\":\"JuiceWRLD\",\"year\":2019,\"duration\":3.43m,\"album\":\"Roses\",\"musicGenres\":\"trap\"},"
              + "{\"author\":\"Maroon5\",\"year\":\2014,\"duration\":4.40m,\"album\":\"Animals\",\"musicGenres\":\"Poprock\"}"
              + "{\"author\":\"PostMalone\",\"year\":2018,\"duration\":3.52m,\"album\":\"BetterNow\",\"musicGenres\":\"HipHop,\"}"
              + "{\"author\":\"TwentyOnePilots\",\"year\":2015,\"duration\":3.45m,\"album\":\"Stressed Out\",\"musicGenres\":\"PopRock\"}"
              + "{\"author\":\"Eminen\",\"year\":2020,\"duration\":4.26m,\"album\":\"Godzilla\",\"musicGenres\":\"HipHop\"}]";
       return song;
    }

    /**
     * PUT method for updating or creating an instance of MusicResource
     * @param content representation for the resource
     */
    @PUT
    @Consumes(MediaType.TEXT_PLAIN)
    public void putText(String content) {
    }
}
