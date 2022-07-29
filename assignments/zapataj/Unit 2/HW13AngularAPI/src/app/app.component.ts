import { Component } from '@angular/core';
import { freeApiService } from './services/freeApi.services';
import { SmartWatch } from './classes/smartWatch';
@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'my-first-project';
  constructor(private _freeApiService:freeApiService)
  {
  }
  lstcomments:SmartWatch[] | undefined;
  ngOnInit()
  {
    this._freeApiService.getcomments().subscribe
    (data=>{
       this.lstcomments=data;
       
    });
  }
}
