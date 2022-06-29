import { Component } from '@angular/core';
import { ApiService } from './services/api.service';
import { Electronics } from './model/electronics';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'angular-api';

  constructor(private _ApiService:ApiService) {}

  listElectronics:Electronics[] | undefined;

  ngOnInit(){
    this._ApiService.getElectronics().subscribe
    (data=>{this.listElectronics=data});
  }

}
