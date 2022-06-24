
package ec.espe.edu.hardwareStore.controller;
import com.mongodb.client.MongoCursor;
import static com.mongodb.client.model.Filters.eq;
import ec.espe.edu.hardwareStore.model.Item;
import java.util.ArrayList;
import org.bson.Document;

/**
 *
 * @author Edison Lascano, DCCO-ESPE
 */
public class ItemController {
    
    //CRUD OPERATIONS
    private Item item;
    private DBManager db=new DBManager("hardwareStore","items","mongodb+srv://edison19:admin@clusterawd.rbj5oin.mongodb.net/test");

    public ItemController() {
    }
    
    public Document getItem(int id){
        try{
            MongoCursor<Document> resultDocument = db.getCollection().find(eq("idItem",id)).iterator();
            return resultDocument.next(); 
        }catch(Exception e){
            return null;
        }
    }
    
    public ArrayList<Document> getItem(){
        ArrayList<Document> items=new ArrayList();
        try{
            MongoCursor<Document> resultDocument = db.getCollection().find().iterator();
            while(resultDocument.hasNext()){
                items.add(resultDocument.next());                 
            }
            return items;
        }catch(Exception e){
            return null;
        }
    }
    
    public void postItem(Item item){
        Document doc = new Document();
        doc.append("idItem", item.getIdItem());
        doc.append("name",item.getName());
        doc.append("itemBrand",item.getItemBrand());
        doc.append("description", item.getDescription());
        doc.append("price", item.getPrice());      
        doc.append("inStock", item.getInStock());  
        db.getCollection().insertOne(doc);
    }
    
    public void putItem(Item item){
        Document doc = new Document();
        doc.append("idItem", item.getIdItem());
        doc.append("name",item.getName());
        doc.append("itemBrand",item.getItemBrand());
        doc.append("description", item.getDescription());
        doc.append("price", item.getPrice());      
        doc.append("inStock", item.getInStock());  
        try{
            db.getCollection().findOneAndReplace(eq("idItem",item.getIdItem()), doc);
        }catch(Exception e){

        }
    }
    
    public void deleteItem(int id){
        try{
            db.getCollection().findOneAndDelete(eq("idItem",id));            
        }catch(Exception e){
            
        }
    }
    
}
