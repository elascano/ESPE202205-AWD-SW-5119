/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package webServices;

import com.mongodb.util.JSON;
import dbManage.DBManager;
import java.util.ArrayList;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Produces;
import javax.ws.rs.Consumes;
import javax.ws.rs.GET;
import javax.ws.rs.POST;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.PathParam;
import javax.ws.rs.core.MediaType;
import soccer.SoccerPlayer;


/**
 * REST Web Service
 *
 * @author G401
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
     * Retrieves representation of an instance of webServices.SoccerPlayerResource
     * @return an instance of soccer.SoccerPlayer
     */
    @GET
    @Path("{id}")
    @Produces(MediaType.APPLICATION_JSON)
    public SoccerPlayer getJson(@PathParam("id") int id) {
        //TODO return proper representation object
        DBManager dbManager=new DBManager("SoccerPlayers");
        return dbManager.getPlayers(id);        
    }
    
    @POST
    @Consumes(MediaType.APPLICATION_JSON)
    public void postJson(SoccerPlayer content) {
        DBManager dbManager=new DBManager("SoccerPlayers");
        dbManager.insert(content);
    }
}
