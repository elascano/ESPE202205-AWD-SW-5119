/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package webservices;

import ec.edu.espe.keyboard.Keyboard;
import ec.edu.espe.keyboard.Connection;
import java.util.ArrayList;
import java.util.HashSet;
import java.util.List;
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
 * @author Fernando
 */
@Path("brand")
public class KeyboardResources {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of KeyboardResources
     */
    public KeyboardResources() {
    }

    /**
     * Retrieves representation of an instance of webservices.KeyboardResources
     * @param brand
     * @return an instance of java.lang.String
     */
    

    
    @GET
    @Path("{brand}")
    @Produces(MediaType.APPLICATION_JSON)
    public Keyboard getKeyboardBrand(@PathParam("brand") String brand) {
        Keyboard keyboard = new Keyboard();
        Connection dataBasekeyboard= new Connection("Keyboard");
        keyboard = dataBasekeyboard.getKeyboardByBrand(brand);
        return keyboard;
    }
    
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    public List<Keyboard> getKeyboardSearch() {
        List<Keyboard> keyboardModels = new ArrayList<>();
        Connection dataBasekeyboard= new Connection("Keyboard");
        keyboardModels = dataBasekeyboard.getAllKeyboard();
        return keyboardModels;
    }
}
