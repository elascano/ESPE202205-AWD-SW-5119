/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package webservices;

import ec.edu.espe.soccer.control.DbManager;
import ec.edu.espe.soccer.model.SoccerPlayer;
import java.util.ArrayList;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Consumes;
import javax.ws.rs.Produces;
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.PathParam;
import javax.ws.rs.core.MediaType;

/**
 * REST Web Service
 *
 * @author usuario
 */
@Path("soccerPlayer")
public class SoccerPlayerResource {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of SoccerPlayerResource
     */
    public SoccerPlayerResource() {
    }

    /**
     * Retrieves representation of an instance of webservices.SoccerPlayerResource
     * @return an instance of ec.edu.espe.soccer.model.SoccerPlayer
     */
    @GET
    @Path("{id}")
    @Produces(MediaType.APPLICATION_JSON)
    public SoccerPlayer getJson(@PathParam("id")int id) {
        DbManager dbManager = new DbManager("SoccerPlayer");
        
        SoccerPlayer player = dbManager.search(id);
        return player;
    }

    
    @GET

    @Produces(MediaType.APPLICATION_JSON)
    public ArrayList<SoccerPlayer> getPlayers() {
        DbManager dbManager = new DbManager("SoccerPlayer");
        
        ArrayList<SoccerPlayer> player = dbManager.retrievePlayers();
        return player;
    }
    
    /**
     * PUT method for updating or creating an instance of SoccerPlayerResource
     * @param content representation for the resource
     */
    @PUT
    @Consumes(MediaType.APPLICATION_JSON)
    public void putJson(SoccerPlayer content) {
    }
}
