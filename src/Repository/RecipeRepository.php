<?php
// Repositorio das ações de adicionar, editar, excluir... de cada item da tabela recipe//
namespace Recipe\Mvc\Repository;

use Recipe\Mvc\Entity\Recipe;

class RecipeRepository
{
    public function __construct(private \PDO $pdo)
    {
    }

    public function add(Recipe $recipe): bool
    {
        $sql = 'INSERT INTO recipe (url, title, description) 
                VALUES (:url, :title, :description)';

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':url', $recipe->getUrl());
        $stmt->bindValue(':title', $recipe->getTitle());
        $stmt->bindValue(':description', $recipe->getDescription());

        $result = $stmt->execute();
        $id = $this->pdo->lastInsertId();

        $recipe->setId((int)$id);

        return $result;
    }

    public function remove(int $id): bool
    {
        $sql = 'DELETE FROM recipe WHERE id = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $id);

        return $stmt->execute();
    }

    public function update(Recipe $recipe): bool
    {
        $sql = 'UPDATE recipe SET 
                url = :url, 
                title = :title, 
                description = :description 
                WHERE id = :id;';

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(':url', $recipe->getUrl());
        $stmt->bindValue(':title', $recipe->getTitle());
        $stmt->bindValue(':description', $recipe->getDescription());
        $stmt->bindValue(':id', $recipe->getId(), \PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function all(): array
    {
        $recipeList = $this->pdo
            ->query('SELECT * FROM recipe;')
            ->fetchAll(\PDO::FETCH_ASSOC);

        return array_map(
            [$this, 'hydrateRecipe'],
            $recipeList
        );
    }

    public function find(int $id): ?Recipe
    {
        $stmt = $this->pdo->prepare('SELECT * FROM recipe WHERE id = ?;');
        $stmt->bindValue(1, $id, \PDO::PARAM_INT);
        $stmt->execute();

        $recipeData = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $recipeData ? $this->hydrateRecipe($recipeData) : null;
    }

    private function hydrateRecipe(array $recipeData): Recipe
    {
        $recipe = new Recipe(
            $recipeData['url'],
            $recipeData['title'],
            $recipeData['description']
        );
        $recipe->setId((int)$recipeData['id']);
        return $recipe;
    }
}
