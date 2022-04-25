import { NgModule } from "@angular/core";
import { RouterModule, Routes } from "@angular/router";
import { BodyComponent } from "./components/body/body.component";

const routes: Routes = [
    { path: '', component: BodyComponent,
        children: [

        ] 
    }
];

@NgModule({
    imports: [RouterModule.forChild(routes)],
    exports: [RouterModule]
})
export class GpRoutingModule { }