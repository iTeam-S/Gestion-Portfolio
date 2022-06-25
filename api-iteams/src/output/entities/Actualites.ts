import { Column, Entity, PrimaryGeneratedColumn } from "typeorm";

@Entity("actualites", { schema: "ITEAMS" })
export class Actualites {
  @PrimaryGeneratedColumn({ type: "int", name: "id" })
  id: number;

  @Column("varchar", { name: "titre", nullable: true, length: 250 })
  titre: string | null;

  @Column("text", { name: "description", nullable: true })
  description: string | null;

  @Column("text", { name: "image", nullable: true })
  image: string | null;

  @Column("date", {
    name: "date",
    nullable: true,
    default: () => "CURRENT_TIMESTAMP",
  })
  date: string | null;
}
