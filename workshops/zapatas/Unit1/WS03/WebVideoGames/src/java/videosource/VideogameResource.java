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
import javax.ws.rs.PathParam;
import javax.ws.rs.core.MediaType;

/**
 * REST Web Service
 *
 * @author HP
 */
@Path("Videogame")
public class VideogameResource {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of VideogameResource
     */
    public VideogameResource() {
    }

    /**
     * Retrieves representation of an instance of videosource.VideogameResource
     * @return an instance of videosource.Videogame
     */
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    public Videogame getJson() {
     Videogame video= new Videogame();
     video.setIdGame(1);
     video.setName("MarioBros");
     video.setType("Adventure");
     video.setConsole("Nintendo64");
       Videogame video1= new Videogame();
     video1.setIdGame(2);
     video1.setName("MarioBros");
     video1.setType("Adventure");
     video1.setConsole("Nintendo64");
     
     return video;
    }

    /**
     * PUT method for updating or creating an instance of VideogameResource
     * @param content representation for the resource
     */
    @PUT
    @Consumes(MediaType.APPLICATION_JSON)
    public void putJson(Videogame content) {
    }
}
