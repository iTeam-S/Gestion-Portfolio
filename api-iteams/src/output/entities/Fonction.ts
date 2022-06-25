import {
  Column,
  Entity,
  Index,
  JoinColumn,
  ManyToOne,
  PrimaryGeneratedColumn,
} from "typeorm";
import { Membre } from "./Membre";

@Index("FK_fonction_poste", ["idPoste"], {})
@Index("FK_fonction_membre", ["idMembre"], {})
@Entity("fonction", { schema: "ITEAMS" })
export class Fonction {
  @PrimaryGeneratedColumn({ type: "int", name: "id" })
  id: number;

  @Column("datetime", {
    name: "date_debut_fonction",
    default: () => "'2020-11-20 00:00:00'",
  })
  dateDebutFonction: Date;

  @Column("datetime", { name: "date_fin_fonction", nullable: true })
  dateFinFonction: Date | null;

  @Column("int", { name: "id_membre", default: () => "'0'" })
  idMembre: number;

  @Column("int", { name: "id_poste", default: () => "'0'" })
  idPoste: number;

  @ManyToOne(() => Membre, (membre) => membre.fonctions, {
    onDelete: "CASCADE",
    onUpdate: "RESTRICT",
  })
  @JoinColumn([{ name: "id_membre", referencedColumnName: "id" }])
  idMembre2: Membre;
}
