import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { BodyComponent } from './components/body/body.component';
import { GpRoutingModule } from './gp-routing.module';



@NgModule({
  declarations: [
    BodyComponent
  ],
  imports: [
    CommonModule,
    GpRoutingModule
  ],
  exports: [
    BodyComponent
  ]
})
export class GpModule { }
