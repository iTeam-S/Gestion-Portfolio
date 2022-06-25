import { Column, Entity, PrimaryGeneratedColumn } from "typeorm";

@Entity("poste", { schema: "ITEAMS" })
export class Poste {
  @PrimaryGeneratedColumn({ type: "int", name: "id" })
  id: number;

  @Column("varchar", { name: "nom", length: 50 })
  nom: string;

  @Column("varchar", { name: "categorie", nullable: true, length: 50 })
  categorie: string | null;
}
