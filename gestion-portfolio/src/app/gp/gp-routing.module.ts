import { NgModule } from "@angular/core";
import { RouterModule, Routes } from "@angular/router";

import { AutresComponent } from "./components/autres/autres.component";
import { BodyComponent } from "./components/body/body.component";
import { CompetencesComponent } from "./components/competences/competences.component";
import { DistinctionsComponent } from "./components/distinctions/distinctions.component";
import { ExperiencesComponent } from "./components/experiences/experiences.component";
import { FonctionComponent } from "./components/fonction/fonction.component";
import { FormationsComponent } from "./components/formations/formations.component";
import { MembreComponent } from "./components/membre/membre.component";
import { ProjetsComponent } from "./components/projets/projets.component";


const routes: Routes = [
    { path: '', component: BodyComponent,
        children: [
            { path: 'membre', component: MembreComponent },
            { path: 'fonction', component: FonctionComponent },
            { path: 'formations', component: FormationsComponent },
            { path: 'experiences', component: ExperiencesComponent },
            { path: 'competences', component: CompetencesComponent },
            { path: 'distinctions', component: DistinctionsComponent },
            { path: 'projets', component: ProjetsComponent },
            { path: 'autres', component: AutresComponent }
        ] 
    }
];

@NgModule({
    imports: [RouterModule.forChild(routes)],
    exports: [RouterModule]
})
export class GpRoutingModule { }
