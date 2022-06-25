import {Injectable} from '@angular/core'
import { HttpClient } from '@angular/common/http'
import { Observable } from 'rxjs'
@Injectable()
export class freeApiservice
{
constructor(private http:HttpClient){}
    getcomments():Observable<any>{
        return this.http.get("https://jsonplaceholder.typicode.com/posts/1/comments");
    }
}
