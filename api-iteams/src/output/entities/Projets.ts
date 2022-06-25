import { Column, Entity, PrimaryGeneratedColumn } from "typeorm";

@Entity("projets", { schema: "ITEAMS" })
export class Projets {
  @PrimaryGeneratedColumn({ type: "int", name: "id" })
  id: number;

  @Column("varchar", { name: "nom", length: 255 })
  nom: string;

  @Column("text", { name: "description" })
  description: string;

  @Column("text", { name: "lien" })
  lien: string;

  @Column("text", { name: "pdc" })
  pdc: string;

  @Column("int", { name: "id_membre" })
  idMembre: number;

  @Column("int", { name: "ordre" })
  ordre: number;
}
